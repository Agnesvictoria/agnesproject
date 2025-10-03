<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

    public function insert_article($title, $content, $author_id, $category_id, $tags) {
        // Insert artikel utama
        $this->db->insert('articles', [
            'title' => $title,
            'content' => $content,
            'author_id' => $author_id
        ]);
        $article_id = $this->db->insert_id();

        // Simpan kategori (hanya 1)
        if ($category_id) {
            $this->db->insert('article_category', [
                'article_id' => $article_id,
                'category_id' => $category_id
            ]);
        }

        // Simpan tag
        if ($tags) {
            foreach ($tags as $tag_id) {
                $this->db->insert('article_tag', [
                    'article_id' => $article_id,
                    'tag_id' => $tag_id
                ]);
            }
        }
    }

    // Ambil semua artikel (untuk index)
    public function get_all_articles() {
        $this->db->select('articles.id, articles.title, articles.content, authors.name as author_name, 
                           GROUP_CONCAT(DISTINCT categories.name SEPARATOR ", ") as categories,
                           GROUP_CONCAT(DISTINCT tags.name SEPARATOR ", ") as tags,
                           articles.created_at');
        $this->db->from('articles');
        $this->db->join('authors', 'authors.id = articles.author_id', 'left');
        $this->db->join('article_category', 'article_category.article_id = articles.id', 'left');
        $this->db->join('categories', 'categories.id = article_category.category_id', 'left');
        $this->db->join('article_tag', 'article_tag.article_id = articles.id', 'left');
        $this->db->join('tags', 'tags.id = article_tag.tag_id', 'left');
        $this->db->group_by('articles.id');
        return $this->db->get()->result();
    }

    // Delete artikel
    public function delete_article($id) {
        return $this->db->delete('articles', ['id' => $id]);
    }

    // Ambil artikel berdasarkan ID (untuk edit/detail)
    public function get_article_by_id($id) {
        $this->db->select('articles.id, articles.title, articles.content, articles.author_id, articles.created_at,
                           article_category.category_id,
                           authors.name as author_name,
                           categories.name as category_name');
        $this->db->from('articles');
        $this->db->join('authors', 'authors.id = articles.author_id', 'left');
        $this->db->join('article_category', 'article_category.article_id = articles.id', 'left');
        $this->db->join('categories', 'categories.id = article_category.category_id', 'left');
        $this->db->where('articles.id', $id);
        return $this->db->get()->row();
    }

    // Ambil tag ID artikel (untuk edit)
    public function get_article_tag($article_id) {
        $this->db->select('tag_id');
        $this->db->from('article_tag');
        $this->db->where('article_id', $article_id);
        $result = $this->db->get()->result();

        return array_map(function($row) {
            return $row->tag_id;
        }, $result);
    }

    // Update artikel
    public function update_article($id, $data, $tags, $category_id) {
        // Update data utama
        $this->db->where('id', $id);
        $this->db->update('articles', $data);

        // Update kategori (hapus lama, insert baru)
        $this->db->where('article_id', $id);
        $this->db->delete('article_category');

        if ($category_id) {
            $this->db->insert('article_category', [
                'article_id' => $id,
                'category_id' => $category_id
            ]);
        }

        // Update tags (hapus lama, insert baru)
        $this->db->where('article_id', $id);
        $this->db->delete('article_tag');

        if ($tags) {
            foreach ($tags as $tag_id) {
                $this->db->insert('article_tag', [
                    'article_id' => $id,
                    'tag_id' => $tag_id
                ]);
            }
        }
    }

    // Ambil tags artikel untuk detail
    public function get_tags_by_article($article_id) {
        $this->db->select('tags.name');
        $this->db->from('article_tag');
        $this->db->join('tags', 'tags.id = article_tag.tag_id', 'left');
        $this->db->where('article_tag.article_id', $article_id);
        return $this->db->get()->result_array();
    }
}
