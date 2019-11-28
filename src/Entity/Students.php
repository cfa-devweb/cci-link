<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Students
 *
 * @ORM\Table(name="students", indexes={@ORM\Index(name="fk_Students_Sections1_idx", columns={"sections_id"}), @ORM\Index(name="fk_Students_Users1_idx", columns={"users_id"})})
 * @ORM\Entity
 */
class Students
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=false)
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 25,
     *      minMessage = "Le prénom ne peut pas contenir une seule lettre",
     *      maxMessage = "Le prénom ne peut pas excéder {{ limit }} lettres"
     * )
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=false)
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 25,
     *      minMessage = "Le nom de famille ne peut pas contenir une seule lettre",
     *      maxMessage = "Le nom de famille ne peut pas excéder {{ limit }} lettres"
     * )
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="min_description", type="string", length=100, nullable=true)
     */
    private $minDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     */
    private $location;

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", length=100, nullable=true)
     */
    private $website;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 2,
     *      exactMessage = "L'âge doit contenir {{ limit }} chiffres",
     * )
     */
    private $age;

    /**
     * @var int
     *
     * @ORM\Column(name="phone_number", type="integer", nullable=false)
     * 
     * @Assert\Length(
     *      min = 6,
     *      max = 6,
     *      exactMessage = "Le numéro de téléphone doit contenir {{ limit }} caractères",
     * )
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas valide."
     * )
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cover_image", type="string", length=255, nullable=true)
     */
    private $coverImage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="github", type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @var string|null
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @var \Sections
     *
     * @ORM\ManyToOne(targetEntity="Sections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sections_id", referencedColumnName="id")
     * })
     */
    private $sections;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Educations", mappedBy="student", fetch="EAGER")
     */
    private $educations;

    public function __construct()
    {
        $this->educations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMinDescription(): ?string
    {
        return $this->minDescription;
    }

    public function setMinDescription(?string $minDescription): self
    {
        $this->minDescription = $minDescription;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(?string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getSections(): ?Sections
    {
        return $this->sections;
    }

    public function setSections(?Sections $sections): self
    {
        $this->sections = $sections;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection|Educations[]
     */
    public function getEducations(): Collection
    {
        return $this->educations;
    }

    public function addEducation(Educations $education): self
    {
        if (!$this->educations->contains($education)) {
            $this->educations[] = $education;
            $education->setStudent($this);
        }

        return $this;
    }

    public function removeEducation(Educations $education): self
    {
        if ($this->educations->contains($education)) {
            $this->educations->removeElement($education);
            // set the owning side to null (unless already changed)
            if ($education->getStudent() === $this) {
                $education->setStudent(null);
            }
        }

        return $this;
    }

    // /**
    //  * @return Collection|Educations[]
    //  */
    // public function getEducationss(): Collection
    // {
    //     return $this->educationss;
    // }
}
