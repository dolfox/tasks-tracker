<?php

namespace App\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Projeto")
 */
class Projeto
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="descricao")
     */
    private string $descircao;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="nome")
     */
    private string $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="dt_cadastro", nullable=false)
     */
    private \DateTime $dtCadastro;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Task", mappedBy="projeto", fetch="EAGER")
     */
    private Collection $tasks;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescircao(): string
    {
        return $this->descircao;
    }

    /**
     * @param string $descircao
     */
    public function setDescircao(string $descircao): void
    {
        $this->descircao = $descircao;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return \DateTime
     */
    public function getDtCadastro(): \DateTime
    {
        return $this->dtCadastro;
    }

    /**
     * @param \DateTime $dtCadastro
     */
    public function setDtCadastro(\DateTime $dtCadastro): void
    {
        $this->dtCadastro = $dtCadastro;
    }

    /**
     * @return Collection
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    /**
     * @param ArrayCollection $tasks
     */
    public function setTasks(ArrayCollection $tasks): void
    {
        $this->tasks = $tasks;
    }

    public function addTask(Task $task)
    {
        $task->setProjeto($this);
        $this->tasks->add($task);
    }
}
