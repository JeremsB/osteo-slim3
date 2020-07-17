<?php


namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * JoIdent
 *
 * @ORM\Table(name="JO_IDENT")
 * @ORM\Entity
 */
class JoIdent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDENT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identId;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=50, nullable=true)
     */
    private $mdp;

    /**
     * @var boolean
     *
     * @ORM\Column(name="admin", type="boolean", nullable=true)
     */
    private $admin;


    /**
     * Get identId
     *
     * @return integer
     */
    public function getIdentId()
    {
        return $this->identId;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return JoIdent
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     *
     * @return JoIdent
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set admin
     *
     * @param boolean $admin
     *
     * @return JoIdent
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean
     */
    public function getAdmin()
    {
        return $this->admin;
    }
}

