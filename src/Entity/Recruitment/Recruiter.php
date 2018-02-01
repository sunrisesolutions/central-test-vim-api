<?php

namespace App\Entity\Recruitment;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * To hold data about the Recruiter/Employer.
 * @ApiResource(attributes={
 * })
 *
 * @ORM\Entity()
 * @ORM\Table(name="recruitment__recruiter")
 */
class Recruiter {
	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\Column(type="integer",options={"unsigned":true})
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	function __construct() {
		$this->sessions = new ArrayCollection();
	}
	
	/**
	 * @var Collection
	 * @ORM\OneToMany(targetEntity="App\Entity\Interview\InterviewSession", mappedBy="recruiter", cascade={"persist", "merge"})
	 * @ApiSubresource()
	 */
	protected $sessions;
	
	
	/**
	 * @var Collection
	 * @ORM\OneToMany(targetEntity="App\Entity\Interview\InterviewSetting", mappedBy="recruiter", cascade={"persist", "merge"})
	 * @ApiSubresource()
	 */
	protected $interviews;
	
	/**
	 * @var string
	 * @ORM\Column(type="string", length=50)
	 */
	protected $recruiterId;
//////////////////////////////////////
///
///
///
//////////////////////////////////////
	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @return Collection
	 */
	public function getSessions(): Collection {
		return $this->sessions;
	}
	
	/**
	 * @param Collection $sessions
	 */
	public function setSessions(Collection $sessions): void {
		$this->sessions = $sessions;
	}
	
	/**
	 * @return Collection
	 */
	public function getInterviews(): Collection {
		return $this->interviews;
	}
	
	/**
	 * @param Collection $interviews
	 */
	public function setInterviews(Collection $interviews): void {
		$this->interviews = $interviews;
	}
	
	/**
	 * @return string
	 */
	public function getRecruiterId(): string {
		return $this->recruiterId;
	}
	
	/**
	 * @param string $recruiterId
	 */
	public function setRecruiterId(string $recruiterId): void {
		$this->recruiterId = $recruiterId;
	}
	
}