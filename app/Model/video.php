<?php 

    namespace App\Model;


    use App\Model\Media;
    use App\Model\Course;
    use App\Model\Etape;


    class Video extends Media{
        private string $type;
        private ?Course $course;
        private ?Etape $etape;

        public function __construct(int $id,string $url,string $type,?Course $course,?Etape $etape)
        {
            parent::__construct($id,$url);
            $this->type = $type;
            $this->course = $course;
            $this->etape = $etape;
        }

    }
