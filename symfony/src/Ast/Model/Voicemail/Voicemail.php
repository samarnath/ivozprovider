<?php

namespace Ast\Model\Voicemail;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Voicemail
 */
class Voicemail implements EntityInterface, VoicemailInterface
{
    /**
     * @var integer
     */
    protected $uniqueid;

    /**
     * @var string
     */
    protected $context;

    /**
     * @var string
     */
    protected $mailbox;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $fullname;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $pager;

    /**
     * @var string
     */
    protected $attach;

    /**
     * @var string
     */
    protected $attachfmt;

    /**
     * @var string
     */
    protected $serveremail;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $tz;

    /**
     * @column deleteast_voicemail
     * @var string
     */
    protected $deleteVoicemail;

    /**
     * @var string
     */
    protected $saycid;

    /**
     * @column sendast_voicemail
     * @var string
     */
    protected $sendVoicemail;

    /**
     * @var string
     */
    protected $review;

    /**
     * @var string
     */
    protected $tempgreetwarn;

    /**
     * @var string
     */
    protected $operator;

    /**
     * @var string
     */
    protected $envelope;

    /**
     * @var integer
     */
    protected $sayduration;

    /**
     * @var string
     */
    protected $forcename;

    /**
     * @var string
     */
    protected $forcegreetings;

    /**
     * @var string
     */
    protected $callback;

    /**
     * @var string
     */
    protected $dialout;

    /**
     * @var string
     */
    protected $exitcontext;

    /**
     * @var integer
     */
    protected $maxmsg;

    /**
     * @var string
     */
    protected $volgain;

    /**
     * @var string
     */
    protected $imapuser;

    /**
     * @var string
     */
    protected $imappassword;

    /**
     * @var string
     */
    protected $imapserver;

    /**
     * @var string
     */
    protected $imapport;

    /**
     * @var string
     */
    protected $imapflags;

    /**
     * @var \DateTime
     */
    protected $stamp;

    /**
     * @var \Core\Model\User\User
     */
    protected $user;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($context, $mailbox)
    {
        $this->setContext($context);
        $this->setMailbox($mailbox);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return VoicemailDTO
     */
    public static function createDTO()
    {
        return new VoicemailDTO();
    }

    /**
     * Factory method
     * @param VoicemailDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, VoicemailDTO::class);

        $self = new self(
            $dto->getContext(),
            $dto->getMailbox()
        );

        return $self
            ->setPassword($dto->getPassword())
            ->setFullname($dto->getFullname())
            ->setAlias($dto->getAlias())
            ->setEmail($dto->getEmail())
            ->setPager($dto->getPager())
            ->setAttach($dto->getAttach())
            ->setAttachfmt($dto->getAttachfmt())
            ->setServeremail($dto->getServeremail())
            ->setLanguage($dto->getLanguage())
            ->setTz($dto->getTz())
            ->setDeleteVoicemail($dto->getDeleteVoicemail())
            ->setSaycid($dto->getSaycid())
            ->setSendVoicemail($dto->getSendVoicemail())
            ->setReview($dto->getReview())
            ->setTempgreetwarn($dto->getTempgreetwarn())
            ->setOperator($dto->getOperator())
            ->setEnvelope($dto->getEnvelope())
            ->setSayduration($dto->getSayduration())
            ->setForcename($dto->getForcename())
            ->setForcegreetings($dto->getForcegreetings())
            ->setCallback($dto->getCallback())
            ->setDialout($dto->getDialout())
            ->setExitcontext($dto->getExitcontext())
            ->setMaxmsg($dto->getMaxmsg())
            ->setVolgain($dto->getVolgain())
            ->setImapuser($dto->getImapuser())
            ->setImappassword($dto->getImappassword())
            ->setImapserver($dto->getImapserver())
            ->setImapport($dto->getImapport())
            ->setImapflags($dto->getImapflags())
            ->setStamp($dto->getStamp())
            ->setUser($dto->getUser());
    }

    /**
     * @param VoicemailDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, VoicemailDTO::class);

        $this
            ->setContext($dto->getContext())
            ->setMailbox($dto->getMailbox())
            ->setPassword($dto->getPassword())
            ->setFullname($dto->getFullname())
            ->setAlias($dto->getAlias())
            ->setEmail($dto->getEmail())
            ->setPager($dto->getPager())
            ->setAttach($dto->getAttach())
            ->setAttachfmt($dto->getAttachfmt())
            ->setServeremail($dto->getServeremail())
            ->setLanguage($dto->getLanguage())
            ->setTz($dto->getTz())
            ->setDeleteVoicemail($dto->getDeleteVoicemail())
            ->setSaycid($dto->getSaycid())
            ->setSendVoicemail($dto->getSendVoicemail())
            ->setReview($dto->getReview())
            ->setTempgreetwarn($dto->getTempgreetwarn())
            ->setOperator($dto->getOperator())
            ->setEnvelope($dto->getEnvelope())
            ->setSayduration($dto->getSayduration())
            ->setForcename($dto->getForcename())
            ->setForcegreetings($dto->getForcegreetings())
            ->setCallback($dto->getCallback())
            ->setDialout($dto->getDialout())
            ->setExitcontext($dto->getExitcontext())
            ->setMaxmsg($dto->getMaxmsg())
            ->setVolgain($dto->getVolgain())
            ->setImapuser($dto->getImapuser())
            ->setImappassword($dto->getImappassword())
            ->setImapserver($dto->getImapserver())
            ->setImapport($dto->getImapport())
            ->setImapflags($dto->getImapflags())
            ->setStamp($dto->getStamp())
            ->setUser($dto->getUser());


        return $this;
    }

    /**
     * @return VoicemailDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setUniqueid($this->getUniqueid())
            ->setContext($this->getContext())
            ->setMailbox($this->getMailbox())
            ->setPassword($this->getPassword())
            ->setFullname($this->getFullname())
            ->setAlias($this->getAlias())
            ->setEmail($this->getEmail())
            ->setPager($this->getPager())
            ->setAttach($this->getAttach())
            ->setAttachfmt($this->getAttachfmt())
            ->setServeremail($this->getServeremail())
            ->setLanguage($this->getLanguage())
            ->setTz($this->getTz())
            ->setDeleteVoicemail($this->getDeleteVoicemail())
            ->setSaycid($this->getSaycid())
            ->setSendVoicemail($this->getSendVoicemail())
            ->setReview($this->getReview())
            ->setTempgreetwarn($this->getTempgreetwarn())
            ->setOperator($this->getOperator())
            ->setEnvelope($this->getEnvelope())
            ->setSayduration($this->getSayduration())
            ->setForcename($this->getForcename())
            ->setForcegreetings($this->getForcegreetings())
            ->setCallback($this->getCallback())
            ->setDialout($this->getDialout())
            ->setExitcontext($this->getExitcontext())
            ->setMaxmsg($this->getMaxmsg())
            ->setVolgain($this->getVolgain())
            ->setImapuser($this->getImapuser())
            ->setImappassword($this->getImappassword())
            ->setImapserver($this->getImapserver())
            ->setImapport($this->getImapport())
            ->setImapflags($this->getImapflags())
            ->setStamp($this->getStamp())
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'uniqueid' => $this->getUniqueid(),
            'context' => $this->getContext(),
            'mailbox' => $this->getMailbox(),
            'password' => $this->getPassword(),
            'fullname' => $this->getFullname(),
            'alias' => $this->getAlias(),
            'email' => $this->getEmail(),
            'pager' => $this->getPager(),
            'attach' => $this->getAttach(),
            'attachfmt' => $this->getAttachfmt(),
            'serveremail' => $this->getServeremail(),
            'language' => $this->getLanguage(),
            'tz' => $this->getTz(),
            'deleteVoicemail' => $this->getDeleteVoicemail(),
            'saycid' => $this->getSaycid(),
            'sendVoicemail' => $this->getSendVoicemail(),
            'review' => $this->getReview(),
            'tempgreetwarn' => $this->getTempgreetwarn(),
            'operator' => $this->getOperator(),
            'envelope' => $this->getEnvelope(),
            'sayduration' => $this->getSayduration(),
            'forcename' => $this->getForcename(),
            'forcegreetings' => $this->getForcegreetings(),
            'callback' => $this->getCallback(),
            'dialout' => $this->getDialout(),
            'exitcontext' => $this->getExitcontext(),
            'maxmsg' => $this->getMaxmsg(),
            'volgain' => $this->getVolgain(),
            'imapuser' => $this->getImapuser(),
            'imappassword' => $this->getImappassword(),
            'imapserver' => $this->getImapserver(),
            'imapport' => $this->getImapport(),
            'imapflags' => $this->getImapflags(),
            'stamp' => $this->getStamp(),
            'userId' => $this->getUser() ? $this->getUser()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Get uniqueid
     *
     * @return integer
     */
    public function getUniqueid()
    {
        return $this->uniqueid;
    }

    /**
     * Set context
     *
     * @param string $context
     *
     * @return Voicemail
     */
    protected function setContext($context)
    {
        Assertion::notNull($context);
        Assertion::maxLength($context, 80);

        $this->context = $context;

        return $this;
    }

    /**
     * Get context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set mailbox
     *
     * @param string $mailbox
     *
     * @return Voicemail
     */
    protected function setMailbox($mailbox)
    {
        Assertion::notNull($mailbox);
        Assertion::maxLength($mailbox, 80);

        $this->mailbox = $mailbox;

        return $this;
    }

    /**
     * Get mailbox
     *
     * @return string
     */
    public function getMailbox()
    {
        return $this->mailbox;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Voicemail
     */
    protected function setPassword($password = null)
    {
        if (!is_null($password)) {
            Assertion::maxLength($password, 80);
        }

        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Voicemail
     */
    protected function setFullname($fullname = null)
    {
        if (!is_null($fullname)) {
            Assertion::maxLength($fullname, 80);
        }

        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Voicemail
     */
    protected function setAlias($alias = null)
    {
        if (!is_null($alias)) {
            Assertion::maxLength($alias, 80);
        }

        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Voicemail
     */
    protected function setEmail($email = null)
    {
        if (!is_null($email)) {
            Assertion::maxLength($email, 80);
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pager
     *
     * @param string $pager
     *
     * @return Voicemail
     */
    protected function setPager($pager = null)
    {
        if (!is_null($pager)) {
            Assertion::maxLength($pager, 80);
        }

        $this->pager = $pager;

        return $this;
    }

    /**
     * Get pager
     *
     * @return string
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * Set attach
     *
     * @param string $attach
     *
     * @return Voicemail
     */
    protected function setAttach($attach = null)
    {
        if (!is_null($attach)) {
        }

        $this->attach = $attach;

        return $this;
    }

    /**
     * Get attach
     *
     * @return string
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * Set attachfmt
     *
     * @param string $attachfmt
     *
     * @return Voicemail
     */
    protected function setAttachfmt($attachfmt = null)
    {
        if (!is_null($attachfmt)) {
            Assertion::maxLength($attachfmt, 10);
        }

        $this->attachfmt = $attachfmt;

        return $this;
    }

    /**
     * Get attachfmt
     *
     * @return string
     */
    public function getAttachfmt()
    {
        return $this->attachfmt;
    }

    /**
     * Set serveremail
     *
     * @param string $serveremail
     *
     * @return Voicemail
     */
    protected function setServeremail($serveremail = null)
    {
        if (!is_null($serveremail)) {
            Assertion::maxLength($serveremail, 80);
        }

        $this->serveremail = $serveremail;

        return $this;
    }

    /**
     * Get serveremail
     *
     * @return string
     */
    public function getServeremail()
    {
        return $this->serveremail;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Voicemail
     */
    protected function setLanguage($language = null)
    {
        if (!is_null($language)) {
            Assertion::maxLength($language, 20);
        }

        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set tz
     *
     * @param string $tz
     *
     * @return Voicemail
     */
    protected function setTz($tz = null)
    {
        if (!is_null($tz)) {
            Assertion::maxLength($tz, 30);
        }

        $this->tz = $tz;

        return $this;
    }

    /**
     * Get tz
     *
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * Set deleteVoicemail
     *
     * @param string $deleteVoicemail
     *
     * @return Voicemail
     */
    protected function setDeleteVoicemail($deleteVoicemail = null)
    {
        if (!is_null($deleteVoicemail)) {
        }

        $this->deleteVoicemail = $deleteVoicemail;

        return $this;
    }

    /**
     * Get deleteVoicemail
     *
     * @return string
     */
    public function getDeleteVoicemail()
    {
        return $this->deleteVoicemail;
    }

    /**
     * Set saycid
     *
     * @param string $saycid
     *
     * @return Voicemail
     */
    protected function setSaycid($saycid = null)
    {
        if (!is_null($saycid)) {
        }

        $this->saycid = $saycid;

        return $this;
    }

    /**
     * Get saycid
     *
     * @return string
     */
    public function getSaycid()
    {
        return $this->saycid;
    }

    /**
     * Set sendVoicemail
     *
     * @param string $sendVoicemail
     *
     * @return Voicemail
     */
    protected function setSendVoicemail($sendVoicemail = null)
    {
        if (!is_null($sendVoicemail)) {
        }

        $this->sendVoicemail = $sendVoicemail;

        return $this;
    }

    /**
     * Get sendVoicemail
     *
     * @return string
     */
    public function getSendVoicemail()
    {
        return $this->sendVoicemail;
    }

    /**
     * Set review
     *
     * @param string $review
     *
     * @return Voicemail
     */
    protected function setReview($review = null)
    {
        if (!is_null($review)) {
        }

        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set tempgreetwarn
     *
     * @param string $tempgreetwarn
     *
     * @return Voicemail
     */
    protected function setTempgreetwarn($tempgreetwarn = null)
    {
        if (!is_null($tempgreetwarn)) {
        }

        $this->tempgreetwarn = $tempgreetwarn;

        return $this;
    }

    /**
     * Get tempgreetwarn
     *
     * @return string
     */
    public function getTempgreetwarn()
    {
        return $this->tempgreetwarn;
    }

    /**
     * Set operator
     *
     * @param string $operator
     *
     * @return Voicemail
     */
    protected function setOperator($operator = null)
    {
        if (!is_null($operator)) {
        }

        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set envelope
     *
     * @param string $envelope
     *
     * @return Voicemail
     */
    protected function setEnvelope($envelope = null)
    {
        if (!is_null($envelope)) {
        }

        $this->envelope = $envelope;

        return $this;
    }

    /**
     * Get envelope
     *
     * @return string
     */
    public function getEnvelope()
    {
        return $this->envelope;
    }

    /**
     * Set sayduration
     *
     * @param integer $sayduration
     *
     * @return Voicemail
     */
    protected function setSayduration($sayduration = null)
    {
        if (!is_null($sayduration)) {
            if (!is_null($sayduration)) {
                Assertion::integerish($sayduration);
            }
        }

        $this->sayduration = $sayduration;

        return $this;
    }

    /**
     * Get sayduration
     *
     * @return integer
     */
    public function getSayduration()
    {
        return $this->sayduration;
    }

    /**
     * Set forcename
     *
     * @param string $forcename
     *
     * @return Voicemail
     */
    protected function setForcename($forcename = null)
    {
        if (!is_null($forcename)) {
        }

        $this->forcename = $forcename;

        return $this;
    }

    /**
     * Get forcename
     *
     * @return string
     */
    public function getForcename()
    {
        return $this->forcename;
    }

    /**
     * Set forcegreetings
     *
     * @param string $forcegreetings
     *
     * @return Voicemail
     */
    protected function setForcegreetings($forcegreetings = null)
    {
        if (!is_null($forcegreetings)) {
        }

        $this->forcegreetings = $forcegreetings;

        return $this;
    }

    /**
     * Get forcegreetings
     *
     * @return string
     */
    public function getForcegreetings()
    {
        return $this->forcegreetings;
    }

    /**
     * Set callback
     *
     * @param string $callback
     *
     * @return Voicemail
     */
    protected function setCallback($callback = null)
    {
        if (!is_null($callback)) {
            Assertion::maxLength($callback, 80);
        }

        $this->callback = $callback;

        return $this;
    }

    /**
     * Get callback
     *
     * @return string
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Set dialout
     *
     * @param string $dialout
     *
     * @return Voicemail
     */
    protected function setDialout($dialout = null)
    {
        if (!is_null($dialout)) {
            Assertion::maxLength($dialout, 80);
        }

        $this->dialout = $dialout;

        return $this;
    }

    /**
     * Get dialout
     *
     * @return string
     */
    public function getDialout()
    {
        return $this->dialout;
    }

    /**
     * Set exitcontext
     *
     * @param string $exitcontext
     *
     * @return Voicemail
     */
    protected function setExitcontext($exitcontext = null)
    {
        if (!is_null($exitcontext)) {
            Assertion::maxLength($exitcontext, 80);
        }

        $this->exitcontext = $exitcontext;

        return $this;
    }

    /**
     * Get exitcontext
     *
     * @return string
     */
    public function getExitcontext()
    {
        return $this->exitcontext;
    }

    /**
     * Set maxmsg
     *
     * @param integer $maxmsg
     *
     * @return Voicemail
     */
    protected function setMaxmsg($maxmsg = null)
    {
        if (!is_null($maxmsg)) {
            if (!is_null($maxmsg)) {
                Assertion::integerish($maxmsg);
            }
        }

        $this->maxmsg = $maxmsg;

        return $this;
    }

    /**
     * Get maxmsg
     *
     * @return integer
     */
    public function getMaxmsg()
    {
        return $this->maxmsg;
    }

    /**
     * Set volgain
     *
     * @param string $volgain
     *
     * @return Voicemail
     */
    protected function setVolgain($volgain = null)
    {
        if (!is_null($volgain)) {
            if (!is_null($volgain)) {
                //Assertion::float($volgain);
            }
        }

        $this->volgain = $volgain;

        return $this;
    }

    /**
     * Get volgain
     *
     * @return string
     */
    public function getVolgain()
    {
        return $this->volgain;
    }

    /**
     * Set imapuser
     *
     * @param string $imapuser
     *
     * @return Voicemail
     */
    protected function setImapuser($imapuser = null)
    {
        if (!is_null($imapuser)) {
            Assertion::maxLength($imapuser, 80);
        }

        $this->imapuser = $imapuser;

        return $this;
    }

    /**
     * Get imapuser
     *
     * @return string
     */
    public function getImapuser()
    {
        return $this->imapuser;
    }

    /**
     * Set imappassword
     *
     * @param string $imappassword
     *
     * @return Voicemail
     */
    protected function setImappassword($imappassword = null)
    {
        if (!is_null($imappassword)) {
            Assertion::maxLength($imappassword, 80);
        }

        $this->imappassword = $imappassword;

        return $this;
    }

    /**
     * Get imappassword
     *
     * @return string
     */
    public function getImappassword()
    {
        return $this->imappassword;
    }

    /**
     * Set imapserver
     *
     * @param string $imapserver
     *
     * @return Voicemail
     */
    protected function setImapserver($imapserver = null)
    {
        if (!is_null($imapserver)) {
            Assertion::maxLength($imapserver, 80);
        }

        $this->imapserver = $imapserver;

        return $this;
    }

    /**
     * Get imapserver
     *
     * @return string
     */
    public function getImapserver()
    {
        return $this->imapserver;
    }

    /**
     * Set imapport
     *
     * @param string $imapport
     *
     * @return Voicemail
     */
    protected function setImapport($imapport = null)
    {
        if (!is_null($imapport)) {
            Assertion::maxLength($imapport, 8);
        }

        $this->imapport = $imapport;

        return $this;
    }

    /**
     * Get imapport
     *
     * @return string
     */
    public function getImapport()
    {
        return $this->imapport;
    }

    /**
     * Set imapflags
     *
     * @param string $imapflags
     *
     * @return Voicemail
     */
    protected function setImapflags($imapflags = null)
    {
        if (!is_null($imapflags)) {
            Assertion::maxLength($imapflags, 80);
        }

        $this->imapflags = $imapflags;

        return $this;
    }

    /**
     * Get imapflags
     *
     * @return string
     */
    public function getImapflags()
    {
        return $this->imapflags;
    }

    /**
     * Set stamp
     *
     * @param \DateTime $stamp
     *
     * @return Voicemail
     */
    protected function setStamp($stamp = null)
    {
        if (!is_null($stamp)) {
        }

        $this->stamp = $stamp;

        return $this;
    }

    /**
     * Get stamp
     *
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * Set user
     *
     * @param \Core\Model\User\User $user
     *
     * @return Voicemail
     */
    protected function setUser(\Core\Model\User\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Core\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }



    // @codeCoverageIgnoreEnd
}

