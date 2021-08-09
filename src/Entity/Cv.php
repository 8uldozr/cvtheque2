<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CvRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CvRepository::class)
 */
class Cv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_perso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $video;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="id_cv")
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity=Experiences::class, mappedBy="id_cv")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Skills::class, mappedBy="id_cv")
     */
    private $skills;

    /**
     * @ORM\OneToOne(targetEntity=Candidate::class, mappedBy="id_cv", cascade={"persist", "remove"})
     */
    private $candidate;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUrlPerso(): ?string
    {
        return $this->url_perso;
    }

    public function setUrlPerso(string $url_perso): self
    {
        $this->url_perso = $url_perso;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setIdCv($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getIdCv() === $this) {
                $formation->setIdCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experiences[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experiences $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setIdCv($this);
        }

        return $this;
    }

    public function removeExperience(Experiences $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getIdCv() === $this) {
                $experience->setIdCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Skills[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skills $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setIdCv($this);
        }

        return $this;
    }

    public function removeSkill(Skills $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getIdCv() === $this) {
                $skill->setIdCv(null);
            }
        }

        return $this;
    }

    public function getCandidate(): ?Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(?Candidate $candidate): self
    {
        // unset the owning side of the relation if necessary
        if ($candidate === null && $this->candidate !== null) {
            $this->candidate->setIdCv(null);
        }

        // set the owning side of the relation if necessary
        if ($candidate !== null && $candidate->getIdCv() !== $this) {
            $candidate->setIdCv($this);
        }

        $this->candidate = $candidate;

        return $this;
    }
}
