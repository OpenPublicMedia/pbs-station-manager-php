<?php
/** @noinspection PhpUnused */
declare(strict_types=1);


namespace OpenPublicMedia\PbsStationManager\Entity;

use DateTime;

/**
 * Represents a station object.
 *
 * @package OpenPublicMedia\PbsStationManager\Entity
 */
class Station extends EntityBase
{
    private string $id;
    private string $callSign;
    private string $fullCommonName;
    private string $shortCommonName;
    private string $tagLine;
    private string $timezone;
    private string $secondaryTimezone;
    private bool $passportEnabled;
    private float $annualPassportQualifyingAmount;
    private string $primaryChannel;
    private string $primetimeStart;
    private string $tvssUrl;
    private string $donateUrl;
    private string $kidsLiveStreamUrl;
    private string $websiteUrl;
    private string $learnMorePassportUrl;
    private string $facebookUrl;
    private string $twitterUrl;
    private string $stationKidsUrl;
    private string $passportUrl;
    private string $videoPortalUrl;
    private string $videoPortalBannerUrl;
    private bool $pdp;
    private string $addressLine1;
    private string $addressLine2;
    private string $city;
    private string $state;
    private string $zipCode;
    private string $countryCode;
    private string $email;
    private string $telephone;
    private string $fax;
    private array $images;
    private string $pageTracking;
    private string $eventTracking;
    private DateTime $updatedAt;
    private string $gaLiveStreamUrl;
    private bool $displayLogoOverlay;
    private string $gaLiveStreamFeedCid;
    private string $playerCode;

    /**
     * @var \OpenPublicMedia\PbsStationManager\Entity\LivestreamFeed[]
     */
    private array $livestreamFeeds;

    /**
     * Base entity constructor.
     *
     * @param string $id
     *   GUID of the Station.
     *
     * @param array $apiAttributes
     *   Attributes response from the API. Assumes snake_case key-value pairs.
     */
    public function __construct(string $id, array $apiAttributes = [])
    {
        $this->id = $id;
        parent::__construct($apiAttributes);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCallSign(): string
    {
        return $this->callSign;
    }

    /**
     * @param string $callSign
     */
    public function setCallSign(string $callSign)
    {
        $this->callSign = $callSign;
    }

    /**
     * @return string
     */
    public function getFullCommonName(): string
    {
        return $this->fullCommonName;
    }

    /**
     * @param string $fullCommonName
     */
    public function setFullCommonName(string $fullCommonName)
    {
        $this->fullCommonName = $fullCommonName;
    }

    /**
     * @return string|null
     */
    public function getShortCommonName(): ?string
    {
        return $this->shortCommonName;
    }

    /**
     * @param string|null $shortCommonName
     */
    public function setShortCommonName(?string $shortCommonName)
    {
        $this->shortCommonName = $shortCommonName;
    }

    /**
     * @return string|null
     */
    public function getTagLine(): ?string
    {
        return $this->tagLine;
    }

    /**
     * @param string $tagLine
     */
    public function setTagLine(string $tagLine)
    {
        $this->tagLine = $tagLine;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone(string $timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string|null
     */
    public function getSecondaryTimezone(): ?string
    {
        return $this->secondaryTimezone;
    }

    /**
     * @param string|null $secondaryTimezone
     */
    public function setSecondaryTimezone(?string $secondaryTimezone)
    {
        $this->secondaryTimezone = $secondaryTimezone;
    }

    /**
     * Internal API only.
     *
     * @return bool|null
     */
    public function isPassportEnabled(): ?bool
    {
        return $this->passportEnabled;
    }

    /**
     * @param bool|null $passportEnabled
     *   NULL indicates _not provided_ (e.g. when querying the public API).
     */
    public function setPassportEnabled(?bool $passportEnabled)
    {
        $this->passportEnabled = $passportEnabled;
    }

    /**
     * Internal API only.
     *
     * @return float|null
     */
    public function getAnnualPassportQualifyingAmount(): ?float
    {
        return $this->annualPassportQualifyingAmount;
    }

    /**
     * @param float|null $annualPassportQualifyingAmount
     *   NULL indicates _not provided_ (e.g. when querying the public API).
     */
    public function setAnnualPassportQualifyingAmount(?float $annualPassportQualifyingAmount)
    {
        $this->annualPassportQualifyingAmount = $annualPassportQualifyingAmount;
    }

    /**
     * @return string
     */
    public function getPrimaryChannel(): string
    {
        return $this->primaryChannel;
    }

    /**
     * @param string $primaryChannel
     */
    public function setPrimaryChannel(string $primaryChannel)
    {
        $this->primaryChannel = $primaryChannel;
    }

    /**
     * @return string|null
     */
    public function getPrimetimeStart(): ?string
    {
        return $this->primetimeStart;
    }

    /**
     * @param string|null $primetimeStart
     */
    public function setPrimetimeStart(?string $primetimeStart)
    {
        $this->primetimeStart = $primetimeStart;
    }

    /**
     * @return string|null
     */
    public function getTvssUrl(): ?string
    {
        return $this->tvssUrl;
    }

    /**
     * @param string|null $tvssUrl
     */
    public function setTvssUrl(?string $tvssUrl)
    {
        $this->tvssUrl = $tvssUrl;
    }

    /**
     * @return string|null
     */
    public function getDonateUrl(): ?string
    {
        return $this->donateUrl;
    }

    /**
     * @param string|null $donateUrl
     */
    public function setDonateUrl(?string $donateUrl)
    {
        $this->donateUrl = $donateUrl;
    }

    /**
     * Internal API only.
     *
     * @return string|null
     */
    public function getKidsLiveStreamUrl(): ?string
    {
        return $this->kidsLiveStreamUrl;
    }

    /**
     * @param string|null $kidsLiveStreamUrl
     *   NULL indicates _not provided_ (e.g. when querying the public API).
     */
    public function setKidsLiveStreamUrl(?string $kidsLiveStreamUrl)
    {
        $this->kidsLiveStreamUrl = $kidsLiveStreamUrl;
    }

    /**
     * @return string|null
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * @param string|null $websiteUrl
     */
    public function setWebsiteUrl(?string $websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }

    /**
     * @return string
     */
    public function getLearnMorePassportUrl(): string
    {
        return $this->learnMorePassportUrl;
    }

    /**
     * @param string $learnMorePassportUrl
     */
    public function setLearnMorePassportUrl(string $learnMorePassportUrl): void
    {
        $this->learnMorePassportUrl = $learnMorePassportUrl;
    }

    /**
     * @return string|null
     */
    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }

    /**
     * @param string|null $facebookUrl
     */
    public function setFacebookUrl(?string $facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;
    }

    /**
     * @return string|null
     */
    public function getTwitterUrl(): ?string
    {
        return $this->twitterUrl;
    }

    /**
     * @param string|null $twitterUrl
     */
    public function setTwitterUrl(?string $twitterUrl)
    {
        $this->twitterUrl = $twitterUrl;
    }

    /**
     * @return string|null
     */
    public function getStationKidsUrl(): ?string
    {
        return $this->stationKidsUrl;
    }

    /**
     * @param string|null $stationKidsUrl
     */
    public function setStationKidsUrl(?string $stationKidsUrl)
    {
        $this->stationKidsUrl = $stationKidsUrl;
    }

    /**
     * @return string|null
     */
    public function getPassportUrl(): ?string
    {
        return $this->passportUrl;
    }

    /**
     * @param string|null $passportUrl
     */
    public function setPassportUrl(?string $passportUrl)
    {
        $this->passportUrl = $passportUrl;
    }

    /**
     * @return string|null
     */
    public function getVideoPortalUrl(): ?string
    {
        return $this->videoPortalUrl;
    }

    /**
     * @param string|null $videoPortalUrl
     */
    public function setVideoPortalUrl(?string $videoPortalUrl)
    {
        $this->videoPortalUrl = $videoPortalUrl;
    }

    /**
     * @return string|null
     */
    public function getVideoPortalBannerUrl(): ?string
    {
        return $this->videoPortalBannerUrl;
    }

    /**
     * @param string|null $videoPortalBannerUrl
     */
    public function setVideoPortalBannerUrl(?string $videoPortalBannerUrl)
    {
        $this->videoPortalBannerUrl = $videoPortalBannerUrl;
    }

    /**
     * Internal API only.
     *
     * @return bool|null
     */
    public function isPdp(): ?bool
    {
        return $this->pdp;
    }

    /**
     * @param bool|null $pdp
     *   NULL indicates _not provided_ (e.g. when querying the public API).
     */
    public function setPdp(?bool $pdp)
    {
        $this->pdp = $pdp;
    }

    /**
     * @return string|null
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * @param string|null $addressLine1
     */
    public function setAddressLine1(?string $addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param string|null $addressLine2
     */
    public function setAddressLine2(?string $addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state)
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @param string|null $zipCode
     */
    public function setZipCode(?string $zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string|null $telephone
     */
    public function setTelephone(?string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     */
    public function setFax(?string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages(array $images)
    {
        $this->images = $images;
    }

    /**
     * @return string|null
     */
    public function getPageTracking(): ?string
    {
        return $this->pageTracking;
    }

    /**
     * @param string|null $pageTracking
     */
    public function setPageTracking(?string $pageTracking)
    {
        $this->pageTracking = $pageTracking;
    }

    /**
     * @return string|null
     */
    public function getEventTracking(): ?string
    {
        return $this->eventTracking;
    }

    /**
     * @param string|null $eventTracking
     */
    public function setEventTracking(?string $eventTracking)
    {
        $this->eventTracking = $eventTracking;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getGaLiveStreamUrl(): string
    {
        return $this->gaLiveStreamUrl;
    }

    /**
     * @param string $gaLiveStreamUrl
     */
    public function setGaLiveStreamUrl(string $gaLiveStreamUrl): void
    {
        $this->gaLiveStreamUrl = $gaLiveStreamUrl;
    }

    /**
     * @return bool
     */
    public function isDisplayLogoOverlay(): bool
    {
        return $this->displayLogoOverlay;
    }

    /**
     * @param bool $displayLogoOverlay
     */
    public function setDisplayLogoOverlay(bool $displayLogoOverlay): void
    {
        $this->displayLogoOverlay = $displayLogoOverlay;
    }

    /**
     * @return string
     */
    public function getGaLiveStreamFeedCid(): string
    {
        return $this->gaLiveStreamFeedCid;
    }

    /**
     * @param string $gaLiveStreamFeedCid
     */
    public function setGaLiveStreamFeedCid(string $gaLiveStreamFeedCid): void
    {
        $this->gaLiveStreamFeedCid = $gaLiveStreamFeedCid;
    }

    /**
     * @return string
     */
    public function getPlayerCode(): string
    {
        return $this->playerCode;
    }

    /**
     * @param string $playerCode
     */
    public function setPlayerCode(string $playerCode): void
    {
        $this->playerCode = $playerCode;
    }

    /**
     * @return \OpenPublicMedia\PbsStationManager\Entity\LivestreamFeed[]
     */
    public function getLivestreamFeeds(): array
    {
        return $this->livestreamFeeds;
    }

    /**
     * @param array $livestreamFeeds
     */
    public function setLivestreamFeeds(array $livestreamFeeds): void
    {
        foreach ($livestreamFeeds as $livestreamFeed) {
            if ($livestreamFeed instanceof LivestreamFeed) {
                $this->livestreamFeeds[] = $livestreamFeed;
            } else {
                $this->livestreamFeeds[] = new LivestreamFeed($livestreamFeed);
            }
        }
    }
}
