<?php
class Comment
{
    protected $dataFile;

    public function __construct()
    {
        $dir = __DIR__ . '/../../data';
        if (!is_dir($dir)) mkdir($dir, 0755, true);
        $this->dataFile = $dir . '/comments.json';
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

    public function allForPost($postId)
    {
        $all = $this->load();
        $res = array_filter($all, function($c) use ($postId) {
            return (int)$c['post_id'] === (int)$postId;
        });
        usort($res, function($a,$b){ return $a['id'] <=> $b['id']; });
        return $res;
    }

    public function find($id)
    {
        foreach ($this->load() as $c) {
            if ((int)$c['id'] === (int)$id) return $c;
        }
        return null;
    }

    public function create($data)
    {
        $comments = $this->load();
        $ids = array_column($comments, 'id');
        $next = $ids ? max($ids) + 1 : 1;
        $c = [
            'id' => $next,
            'post_id' => (int)$data['post_id'],
            'author' => $data['author'],
            'body' => $data['body'],
            'created_at' => date('c')
        ];
        $comments[] = $c;
        $this->saveArray($comments);
        return $c;
    }

    public function update($id, $data)
    {
        $comments = $this->load();
        foreach ($comments as &$c) {
            if ((int)$c['id'] === (int)$id) {
                $c['author'] = $data['author'];
                $c['body'] = $data['body'];
                $c['updated_at'] = date('c');
                $this->saveArray($comments);
                return $c;
            }
        }
        return null;
    }

    public function delete($id)
    {
        $comments = $this->load();
        $comments = array_filter($comments, function($c) use ($id) { return (int)$c['id'] !== (int)$id; });
        $this->saveArray(array_values($comments));
    }
}