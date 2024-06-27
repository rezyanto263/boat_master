<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model {

    public function getAllGalleryWithMedias() {
        $this->db->select('g.*, gf.gafileId, gf.mediaId, m.mediaFile, m.mediaType');
        $this->db->from('gallery g');
        $this->db->join('gallery_file gf', 'g.galleryId = gf.galleryId', 'left');
        $this->db->join('media m', 'gf.mediaId = m.mediaId', 'left');
        $this->db->group_by('g.galleryId');
        return $this->db->get()->result_array();
    }

    public function checkGallery($param, $galleryData) {
        return $this->db->get_where('gallery', array($param => $galleryData));
    }

    public function insertGallery($galleryDatas) {
        $this->db->insert('gallery', $galleryDatas);
        return $this->db->insert_id();
    }

    public function insertMedia($mediaDatas) {
        $this->db->insert('media', $mediaDatas);
        return $this->db->insert_id();
    }

    public function insertGalleryFile($gafileDatas) {
        return $this->db->insert('gallery_file', $gafileDatas);
    }

    public function editGallery($galleryId, $galleryDatas) {
        $this->db->where('galleryId', $galleryId);
        return $this->db->update('gallery', $galleryDatas);
    }

    public function deleteGallery($galleryId) {
        $this->db->where('galleryId', $galleryId);
        $gafileData = $this->db->get_where('gallery_file', array('galleryId' => $galleryId))->row_array();
        $mediaId = $gafileData['mediaId'];
        
        $this->db->where('galleryId', $galleryId);
        $this->db->delete('gallery_file');

        $this->db->where('mediaId', $mediaId);
        $this->db->delete('media');
        
        $this->db->where('galleryId', $galleryId);
        return $this->db->delete('gallery');
    }

    public function deleteGafileAndMedia($mediaId) {
        $this->db->where('mediaId', $mediaId);
        $this->db->delete('gallery_file');

        $this->db->where('mediaId', $mediaId);
        return $this->db->delete('media');
    }

}

/* End of file M_gallery.php */

?>