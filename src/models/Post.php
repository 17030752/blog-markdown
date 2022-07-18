<?php

namespace d17030752\Blog\models;
use League\CommonMark\CommonMarkConverter;
use Error;

require_once 'src/models/Url.php';
class Post
{
    public function __construct(private string $file)
    {
        $this->getFileName();
    }
    public function getContent()
    { 
        $converter = new CommonMarkConverter(['html_input' => 'escape']);
        if (file_exists($this->getFileName())) {
            $stream = fopen($this->getFileName(), 'r');
            $content = fread($stream, filesize($this->getFileName()));
            return $converter->convert($content);
        } else {
            $fileUpdated = $this->getFileNameWithoutDash();
            if (file_exists($this->getFileName())) {
                echo "funciona";
                $stream = fopen($this->getFileName(), 'r');
                $content = fread($stream, filesize($this->getFileName()));
                return $converter->convert($content);
            }
            throw new Error("file doesn't not exists!");
        }
    }
    public function getFileName()
    {
        $dir = Url::getRootPath();
        $fileName = "{$dir}/entries/{$this->file}";
        return $fileName;
    }
    public static function getPost()
    {
        $posts = [];

        $files = scandir(Url::getRootPath() . '/entries');
        foreach ($files as $file) {
            if (strpos($file, '.md') > 0) {
                $post = new Post($file);
                array_push($posts, $post);
            }
        }
        return $posts;
    }
    public function getUrl()
    {
        $url = substr($this->file, 0, strpos($this->file, '.md'));
        $title = str_replace('', '-', $url);
        return "http://localhost:80/blog-markdown/?post={$title}";
    }
    public function getFileNameWithoutDash()
    {
        $title = str_replace('-', '', $this->file);
        $this->file = $title;
        return $title;
    }
    public function getPostName(){
        $title = $this->file;
        $title = str_replace('-','',$title);
        $title = str_replace('.md','',$title);
        return $title;
    }
}
