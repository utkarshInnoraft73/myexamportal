<?php

namespace App\Entity;

use App\Repository\ExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ExamRepository::class)]
#[Broadcast]
class Exam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    /**
     * @var int $id
     *  Store the exam id in exam table.
     */
    private ?int $id = null;

    #[ORM\Column(length: 255)]

    /**
     * @var string $exam_name
     *  Store the exam sort name.
     */
    private ?string $exam_name = null;

    #[ORM\Column(length: 100)]

    /**
     * @var string $passing_marks
     *  Store the passing marks.
     */
    private ?string $passing_marks = null;

    // #[ORM\Column(length: 255)]

    // // /**
    // //  * @var Collection<int, Profile>
    // //  */
    // // #[ORM\ManyToMany(targetEntity: Profile::class, mappedBy: 'exam')]
    // // private Collection $profiles;

    /**
     * @var Collection<int, ProfileExamRelated>
     */
    #[ORM\OneToMany(targetEntity: ProfileExamRelated::class, mappedBy: 'exam')]
    private Collection $profileExamsRelatedExam;

    #[ORM\Column(length: 255)]
    private ?string $Created_by = null;

    #[ORM\Column(length: 100)]
    private ?string $total_marks = null;

    #[ORM\Column(length: 100)]
    private ?string $no_of_questios = null;

    // #[ORM\Column(length: 100)]
    // private ?string $negative_marking = null;

    #[ORM\Column(length: 255)]
    private ?string $duration = null;

    /**
     * @var Collection<int, Questions>
     */
    #[ORM\OneToMany(targetEntity: Questions::class, mappedBy: 'exam', orphanRemoval: true)]
    private Collection $question;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $exam_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $required_schooling_marks = null;

    #[ORM\Column(length: 255)]
    private ?string $required_graduation_marks = null;

    public function __construct()
    {
        // $this->profiles = new ArrayCollection();
        $this->profileExamsRelatedExam = new ArrayCollection();
        $this->question = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExamName(): ?string
    {
        return $this->exam_name;
    }

    public function setExamName(string $exam_name): static
    {
        $this->exam_name = $exam_name;

        return $this;
    }

    public function getPassingMarks(): ?string
    {
        return $this->passing_marks;
    }

    public function setPassingMarks(string $passing_marks): static
    {
        $this->passing_marks = $passing_marks;

        return $this;
    }

    // /**
    //  * @return Collection<int, Profile>
    //  */
    // public function getProfiles(): Collection
    // {
    //     return $this->profiles;
    // }

    // public function addProfile(Profile $profile): static
    // {
    //     if (!$this->profiles->contains($profile)) {
    //         $this->profiles->add($profile);
    //         $profile->addExam($this);
    //     }

    //     return $this;
    // }

    // public function removeProfile(Profile $profile): static
    // {
    //     if ($this->profiles->removeElement($profile)) {
    //         $profile->removeExam($this);
    //     }

    //     return $this;
    // }

    /**
     * @return Collection<int, ProfileExamRelated>
     */
    public function getProfileExamsRelatedExam(): Collection
    {
        return $this->profileExamsRelatedExam;
    }

    public function addProfileExamsRelatedExam(ProfileExamRelated $profileExamsRelatedExam): static
    {
        if (!$this->profileExamsRelatedExam->contains($profileExamsRelatedExam)) {
            $this->profileExamsRelatedExam->add($profileExamsRelatedExam);
            $profileExamsRelatedExam->setExam($this);
        }

        return $this;
    }
    public function removeProfileExamsRelatedExam(ProfileExamRelated $profileExamsRelatedExam): static
    {

        if ($this->profileExamsRelatedExam->removeElement($profileExamsRelatedExam)) {
            // set the owning side to null (unless already changed)
            if ($profileExamsRelatedExam->getExam() === $this) {
                $profileExamsRelatedExam->setExam(null);
            }
        }

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->Created_by;
    }

    public function setCreatedBy(string $Created_by): static
    {
        $this->Created_by = $Created_by;

        return $this;
    }

    public function getTotalMarks(): ?string
    {
        return $this->total_marks;
    }

    public function setTotalMarks(string $total_marks): static
    {
        $this->total_marks = $total_marks;

        return $this;
    }

    public function getNoOfQuestios(): ?string
    {
        return $this->no_of_questios;
    }

    public function setNoOfQuestios(string $no_of_questios): static
    {
        $this->no_of_questios = $no_of_questios;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection<int, Questions>
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Questions $question): static
    {
        if (!$this->question->contains($question)) {
            $this->question->add($question);
            $question->setExam($this);
        }

        return $this;
    }

    public function removeQuestion(Questions $question): static
    {
        if ($this->question->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getExam() === $this) {
                $question->setExam(null);
            }
        }

        return $this;
    }

    public function getExamDate(): ?\DateTimeInterface
    {
        return $this->exam_date;
    }

    public function setExamDate(?\DateTimeInterface $exam_date): static
    {
        $this->exam_date = $exam_date;

        return $this;
    }

    public function getRequiredSchoolingMarks(): ?string
    {
        return $this->required_schooling_marks;
    }

    public function setRequiredSchoolingMarks(?string $required_schooling_marks): static
    {
        $this->required_schooling_marks = $required_schooling_marks;

        return $this;
    }

    public function getRequiredGraduationMarks(): ?string
    {
        return $this->required_graduation_marks;
    }

    public function setRequiredGraduationMarks(string $required_graduation_marks): static
    {
        $this->required_graduation_marks = $required_graduation_marks;

        return $this;
    }
}
