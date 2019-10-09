<?php

trait File
{
    private $target;
    protected $fileName;
    private $file;
    private $postName;

    public function setFileName($file, $target, $postName,  $allowedTypes = [])
    {

        $this->target = "$target/";

        $this->file = $file;

        $this->postName = $postName;

        $fileName  = date('dmYHis') . str_replace(" ", "", basename($_FILES["$this->file"]["name"]));;

        $targetFilePath = $this->target . $fileName;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (empty($_FILES["$file"]["name"])) {
            $this->errors[] = 'Please select a file to upload!';
        } else if ($_FILES["$file"]["size"] > 800000) {

            $this->errors[] = 'Sorry, your file is too large.';
        } else if (!in_array($fileType, $allowedTypes)) {

            $this->errors[] = 'Sorry, only PDF files are allowed to upload.';
        } else {

            $this->fileName = $fileName;
        }
    }

    public function uploadFile()
    {
        $targetDir = "$this->target/";
        $fileName = $this->getFileName();

        $targetFilePath = $targetDir . $fileName;

        if (isset($_POST["$this->postName"]) && !empty($_FILES["$this->file"]["name"])) {

            if (move_uploaded_file($_FILES["$this->file"]["tmp_name"], $targetFilePath)) {

                $this->session->flash('uploaded', "The file " . $fileName . " has been uploaded.");
            } else {

                $this->session->flash('upload_error', "Sorry, there was an error uploading your file.", "alert alert-danger");
            }
        }
    }


    public function getFileName()
    {
        return $this->fileName;
    }
}
