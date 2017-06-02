<?php

namespace Ast\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class AstVoicemailDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $uniqueid;

    /**
     * @var string
     */
    public $context;

    /**
     * @var string
     */
    public $mailbox;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $fullname;

    /**
     * @var string
     */
    public $alias;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $pager;

    /**
     * @var string
     */
    public $attach;

    /**
     * @var string
     */
    public $attachfmt;

    /**
     * @var string
     */
    public $serveremail;

    /**
     * @var string
     */
    public $language;

    /**
     * @var string
     */
    public $tz;

    /**
     * @column deleteast_voicemail
     * @var string
     */
    public $deleteastVoicemail;

    /**
     * @var string
     */
    public $saycid;

    /**
     * @column sendast_voicemail
     * @var string
     */
    public $sendastVoicemail;

    /**
     * @var string
     */
    public $review;

    /**
     * @var string
     */
    public $tempgreetwarn;

    /**
     * @var string
     */
    public $operator;

    /**
     * @var string
     */
    public $envelope;

    /**
     * @var integer
     */
    public $sayduration;

    /**
     * @var string
     */
    public $forcename;

    /**
     * @var string
     */
    public $forcegreetings;

    /**
     * @var string
     */
    public $callback;

    /**
     * @var string
     */
    public $dialout;

    /**
     * @var string
     */
    public $exitcontext;

    /**
     * @var integer
     */
    public $maxmsg;

    /**
     * @var string
     */
    public $volgain;

    /**
     * @var string
     */
    public $imapuser;

    /**
     * @var string
     */
    public $imappassword;

    /**
     * @var string
     */
    public $imapserver;

    /**
     * @var string
     */
    public $imapport;

    /**
     * @var string
     */
    public $imapflags;

    /**
     * @var \DateTime
     */
    public $stamp;

    /**
     * @var mixed
     */
    public $userId;

    /**
     * @var mixed
     */
    public $user;

    /**
     * @return array
     */
    public function __toArray()
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
            'deleteastVoicemail' => $this->getDeleteastVoicemail(),
            'saycid' => $this->getSaycid(),
            'sendastVoicemail' => $this->getSendastVoicemail(),
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
            'userId' => $this->getUserId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setUniqueid(isset($data['uniqueid']) ? $data['uniqueid'] : null)
            ->setContext(isset($data['context']) ? $data['context'] : null)
            ->setMailbox(isset($data['mailbox']) ? $data['mailbox'] : null)
            ->setPassword(isset($data['password']) ? $data['password'] : null)
            ->setFullname(isset($data['fullname']) ? $data['fullname'] : null)
            ->setAlias(isset($data['alias']) ? $data['alias'] : null)
            ->setEmail(isset($data['email']) ? $data['email'] : null)
            ->setPager(isset($data['pager']) ? $data['pager'] : null)
            ->setAttach(isset($data['attach']) ? $data['attach'] : null)
            ->setAttachfmt(isset($data['attachfmt']) ? $data['attachfmt'] : null)
            ->setServeremail(isset($data['serveremail']) ? $data['serveremail'] : null)
            ->setLanguage(isset($data['language']) ? $data['language'] : null)
            ->setTz(isset($data['tz']) ? $data['tz'] : null)
            ->setDeleteastVoicemail(isset($data['deleteastVoicemail']) ? $data['deleteastVoicemail'] : null)
            ->setSaycid(isset($data['saycid']) ? $data['saycid'] : null)
            ->setSendastVoicemail(isset($data['sendastVoicemail']) ? $data['sendastVoicemail'] : null)
            ->setReview(isset($data['review']) ? $data['review'] : null)
            ->setTempgreetwarn(isset($data['tempgreetwarn']) ? $data['tempgreetwarn'] : null)
            ->setOperator(isset($data['operator']) ? $data['operator'] : null)
            ->setEnvelope(isset($data['envelope']) ? $data['envelope'] : null)
            ->setSayduration(isset($data['sayduration']) ? $data['sayduration'] : null)
            ->setForcename(isset($data['forcename']) ? $data['forcename'] : null)
            ->setForcegreetings(isset($data['forcegreetings']) ? $data['forcegreetings'] : null)
            ->setCallback(isset($data['callback']) ? $data['callback'] : null)
            ->setDialout(isset($data['dialout']) ? $data['dialout'] : null)
            ->setExitcontext(isset($data['exitcontext']) ? $data['exitcontext'] : null)
            ->setMaxmsg(isset($data['maxmsg']) ? $data['maxmsg'] : null)
            ->setVolgain(isset($data['volgain']) ? $data['volgain'] : null)
            ->setImapuser(isset($data['imapuser']) ? $data['imapuser'] : null)
            ->setImappassword(isset($data['imappassword']) ? $data['imappassword'] : null)
            ->setImapserver(isset($data['imapserver']) ? $data['imapserver'] : null)
            ->setImapport(isset($data['imapport']) ? $data['imapport'] : null)
            ->setImapflags(isset($data['imapflags']) ? $data['imapflags'] : null)
            ->setStamp(isset($data['stamp']) ? $data['stamp'] : null)
            ->setUserId(isset($data['userId']) ? $data['userId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->user = $transformer->transform('Core\\Model\\User\\User', $this->getUserId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $uniqueid
     *
     * @return AstVoicemailDTO
     */
    public function setUniqueid($uniqueid)
    {
        $this->uniqueid = $uniqueid;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUniqueid()
    {
        return $this->uniqueid;
    }

    /**
     * @param string $context
     *
     * @return AstVoicemailDTO
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $mailbox
     *
     * @return AstVoicemailDTO
     */
    public function setMailbox($mailbox)
    {
        $this->mailbox = $mailbox;

        return $this;
    }

    /**
     * @return string
     */
    public function getMailbox()
    {
        return $this->mailbox;
    }

    /**
     * @param string $password
     *
     * @return AstVoicemailDTO
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $fullname
     *
     * @return AstVoicemailDTO
     */
    public function setFullname($fullname = null)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param string $alias
     *
     * @return AstVoicemailDTO
     */
    public function setAlias($alias = null)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $email
     *
     * @return AstVoicemailDTO
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $pager
     *
     * @return AstVoicemailDTO
     */
    public function setPager($pager = null)
    {
        $this->pager = $pager;

        return $this;
    }

    /**
     * @return string
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * @param string $attach
     *
     * @return AstVoicemailDTO
     */
    public function setAttach($attach = null)
    {
        $this->attach = $attach;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * @param string $attachfmt
     *
     * @return AstVoicemailDTO
     */
    public function setAttachfmt($attachfmt = null)
    {
        $this->attachfmt = $attachfmt;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttachfmt()
    {
        return $this->attachfmt;
    }

    /**
     * @param string $serveremail
     *
     * @return AstVoicemailDTO
     */
    public function setServeremail($serveremail = null)
    {
        $this->serveremail = $serveremail;

        return $this;
    }

    /**
     * @return string
     */
    public function getServeremail()
    {
        return $this->serveremail;
    }

    /**
     * @param string $language
     *
     * @return AstVoicemailDTO
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $tz
     *
     * @return AstVoicemailDTO
     */
    public function setTz($tz = null)
    {
        $this->tz = $tz;

        return $this;
    }

    /**
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * @param string $deleteastVoicemail
     *
     * @return AstVoicemailDTO
     */
    public function setDeleteastVoicemail($deleteastVoicemail = null)
    {
        $this->deleteastVoicemail = $deleteastVoicemail;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeleteastVoicemail()
    {
        return $this->deleteastVoicemail;
    }

    /**
     * @param string $saycid
     *
     * @return AstVoicemailDTO
     */
    public function setSaycid($saycid = null)
    {
        $this->saycid = $saycid;

        return $this;
    }

    /**
     * @return string
     */
    public function getSaycid()
    {
        return $this->saycid;
    }

    /**
     * @param string $sendastVoicemail
     *
     * @return AstVoicemailDTO
     */
    public function setSendastVoicemail($sendastVoicemail = null)
    {
        $this->sendastVoicemail = $sendastVoicemail;

        return $this;
    }

    /**
     * @return string
     */
    public function getSendastVoicemail()
    {
        return $this->sendastVoicemail;
    }

    /**
     * @param string $review
     *
     * @return AstVoicemailDTO
     */
    public function setReview($review = null)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param string $tempgreetwarn
     *
     * @return AstVoicemailDTO
     */
    public function setTempgreetwarn($tempgreetwarn = null)
    {
        $this->tempgreetwarn = $tempgreetwarn;

        return $this;
    }

    /**
     * @return string
     */
    public function getTempgreetwarn()
    {
        return $this->tempgreetwarn;
    }

    /**
     * @param string $operator
     *
     * @return AstVoicemailDTO
     */
    public function setOperator($operator = null)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param string $envelope
     *
     * @return AstVoicemailDTO
     */
    public function setEnvelope($envelope = null)
    {
        $this->envelope = $envelope;

        return $this;
    }

    /**
     * @return string
     */
    public function getEnvelope()
    {
        return $this->envelope;
    }

    /**
     * @param integer $sayduration
     *
     * @return AstVoicemailDTO
     */
    public function setSayduration($sayduration = null)
    {
        $this->sayduration = $sayduration;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSayduration()
    {
        return $this->sayduration;
    }

    /**
     * @param string $forcename
     *
     * @return AstVoicemailDTO
     */
    public function setForcename($forcename = null)
    {
        $this->forcename = $forcename;

        return $this;
    }

    /**
     * @return string
     */
    public function getForcename()
    {
        return $this->forcename;
    }

    /**
     * @param string $forcegreetings
     *
     * @return AstVoicemailDTO
     */
    public function setForcegreetings($forcegreetings = null)
    {
        $this->forcegreetings = $forcegreetings;

        return $this;
    }

    /**
     * @return string
     */
    public function getForcegreetings()
    {
        return $this->forcegreetings;
    }

    /**
     * @param string $callback
     *
     * @return AstVoicemailDTO
     */
    public function setCallback($callback = null)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param string $dialout
     *
     * @return AstVoicemailDTO
     */
    public function setDialout($dialout = null)
    {
        $this->dialout = $dialout;

        return $this;
    }

    /**
     * @return string
     */
    public function getDialout()
    {
        return $this->dialout;
    }

    /**
     * @param string $exitcontext
     *
     * @return AstVoicemailDTO
     */
    public function setExitcontext($exitcontext = null)
    {
        $this->exitcontext = $exitcontext;

        return $this;
    }

    /**
     * @return string
     */
    public function getExitcontext()
    {
        return $this->exitcontext;
    }

    /**
     * @param integer $maxmsg
     *
     * @return AstVoicemailDTO
     */
    public function setMaxmsg($maxmsg = null)
    {
        $this->maxmsg = $maxmsg;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxmsg()
    {
        return $this->maxmsg;
    }

    /**
     * @param string $volgain
     *
     * @return AstVoicemailDTO
     */
    public function setVolgain($volgain = null)
    {
        $this->volgain = $volgain;

        return $this;
    }

    /**
     * @return string
     */
    public function getVolgain()
    {
        return $this->volgain;
    }

    /**
     * @param string $imapuser
     *
     * @return AstVoicemailDTO
     */
    public function setImapuser($imapuser = null)
    {
        $this->imapuser = $imapuser;

        return $this;
    }

    /**
     * @return string
     */
    public function getImapuser()
    {
        return $this->imapuser;
    }

    /**
     * @param string $imappassword
     *
     * @return AstVoicemailDTO
     */
    public function setImappassword($imappassword = null)
    {
        $this->imappassword = $imappassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getImappassword()
    {
        return $this->imappassword;
    }

    /**
     * @param string $imapserver
     *
     * @return AstVoicemailDTO
     */
    public function setImapserver($imapserver = null)
    {
        $this->imapserver = $imapserver;

        return $this;
    }

    /**
     * @return string
     */
    public function getImapserver()
    {
        return $this->imapserver;
    }

    /**
     * @param string $imapport
     *
     * @return AstVoicemailDTO
     */
    public function setImapport($imapport = null)
    {
        $this->imapport = $imapport;

        return $this;
    }

    /**
     * @return string
     */
    public function getImapport()
    {
        return $this->imapport;
    }

    /**
     * @param string $imapflags
     *
     * @return AstVoicemailDTO
     */
    public function setImapflags($imapflags = null)
    {
        $this->imapflags = $imapflags;

        return $this;
    }

    /**
     * @return string
     */
    public function getImapflags()
    {
        return $this->imapflags;
    }

    /**
     * @param \DateTime $stamp
     *
     * @return AstVoicemailDTO
     */
    public function setStamp($stamp = null)
    {
        $this->stamp = $stamp;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * @param integer $userId
     *
     * @return AstVoicemailDTO
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return \Core\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

