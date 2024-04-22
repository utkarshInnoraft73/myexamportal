<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
#[Broadcast]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(length: 255)]
    private ?string $opt_a = null;

    #[ORM\Column(length: 255)]
    private ?string $opt_b = null;

    #[ORM\Column(length: 255)]
    private ?string $opt_c = null;

    #[ORM\Column(length: 255)]
    private ?string $opt_d = null;

    #[ORM\Column(length: 255)]
    private ?string $correct_opt = null;

    #[ORM\Column(length: 255)]
    private ?string $marks_for_question = null;

    #[ORM\ManyToOne(inversedBy: 'question')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exam $exam = null;


    public function __construct()
    {
        // $this->examQuestions = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getOptA(): ?string
    {
        return $this->opt_a;
    }

    public function setOptA(string $opt_a): static
    {
        $this->opt_a = $opt_a;

        return $this;
    }

    public function getOptB(): ?string
    {
        return $this->opt_b;
    }

    public function setOptB(string $opt_b): static
    {
        $this->opt_b = $opt_b;

        return $this;
    }

    public function getOptC(): ?string
    {
        return $this->opt_c;
    }

    public function setOptC(string $opt_c): static
    {
        $this->opt_c = $opt_c;

        return $this;
    }

    public function getOptD(): ?string
    {
        return $this->opt_d;
    }

    public function setOptD(string $opt_d): static
    {
        $this->opt_d = $opt_d;

        return $this;
    }

    public function getCorrectOpt(): ?string
    {
        return $this->correct_opt;
    }

    public function setCorrectOpt(string $correct_opt): static
    {
        $this->correct_opt = $correct_opt;

        return $this;
    }

    public function getMarksForQuestion(): ?string
    {
        return $this->marks_for_question;
    }

    public function setMarksForQuestion(string $marks_for_question): static
    {
        $this->marks_for_question = $marks_for_question;

        return $this;
    }

    public function getExam(): ?Exam
    {
        return $this->exam;
    }

    public function setExam(?Exam $exam): static
    {
        $this->exam = $exam;

        return $this;
    }
}
