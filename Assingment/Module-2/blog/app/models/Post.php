<?php
class Post
{
    protected $dataFile;

    public function __construct()
    {
        $dir = __DIR__ . '/../../data';
        if (!is_dir($dir)) mkdir($dir, 0755, true);
        $this->dataFile = $dir . '/posts.json';
        if (!is_file($this->dataFile)) file_put_contents($this->dataFile, json_encode([]));
    }

    protected function load()
    {
        $json = file_get_contents($this->dataFile);
        $arr = json_decode($json, true);
        return is_array($arr) ? $arr : [];
    }

    protected function saveArray($arr)
    {
        file_put_contents($this->dataFile, json_encode($arr, JSON_PRETTY_PRINT), LOCK_EX);
    }

    public function all()
    {
        $posts = $this->load();
        usort($posts, function($a,$b){ return $b['id'] <=> $a['id']; });
        return $posts;
    }

    public function find($id)
    {
        foreach ($this->load() as $p) {
            if ((int)$p['id'] === (int)$id) return $p;
        }
        return null;
    }

    public function create($data)
    {
        $posts = $this->load();
        $ids = array_column($posts, 'id');
        $next = $ids ? max($ids) + 1 : 1;
        $post = [
            'id' => $next,
            'title' => $data['title'],
            'body'  => $data['body'],
            'created_at' => date('c')
        ];
        $posts[] = $post;
        $this->saveArray($posts);
        return $post;
    }

    public function update($id, $data)
    {
        $posts = $this->load();
        foreach ($posts as &$p) {
            if ((int)$p['id'] === (int)$id) {
                $p['title'] = $data['title'];
                $p['body'] = $data['body'];
                $p['updated_at'] = date('c');
                $this->saveArray($posts);
                return $p;
            }
        }
        return null;
    }

    public function delete($id)
    {
        $posts = $this->load();
        $posts = array_filter($posts, function($p) use ($id) { return (int)$p['id'] !== (int)$id; });
        $this->saveArray(array_values($posts));
    }
}