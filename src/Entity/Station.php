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
    private ?string $shortCommonName = null;
    private ?string $tagLine = null;
    private string $timezone;
    private ?string $secondaryTimezone = null;
    private ?bool $passportEnabled = null;
    private ?float $annualPassportQualifyingAmount = null;
    private string $primaryChannel;
    private string $primetimeStart;
    private ?string $tvssUrl = null;
    private ?string $donateUrl = null;
    private ?string $kidsLiveStreamUrl = null;
    private ?string $websiteUrl = null;
    private ?string $learnMorePassportUrl = null;
    private ?string $facebookUrl = null;
    private ?string $twitterUrl = null;
    private ?string $stationKidsUrl = null;
    private ?string $passportUrl = null;
    private ?string $videoPortalUrl = null;
    private ?string $videoPortalBannerUrl = null;
    private bool $pdp;
    private ?string $addressLine1 = null;
    private ?string $addressLine2 = null;
    private ?string $city = null;
    private ?string $state = null;
    private ?string $zipCode = null;
    private ?string $countryCode = null;
    private ?string $email = null;
    private ?string $telephone = null;
    private ?string $fax = null;
    private array $images;
    private ?string $pageTracking = null;
    private ?string $eventTracking = null;
    private DateTime $updatedAt;
    private ?string $gaLiveStreamUrl = null;
    private bool $displayLogoOverlay;
    private ?string $gaLiveStreamFeedCid = null;
    private ?string $playerCode = null;

    /**
     * @var \OpenPublicMedia\PbsStationManager\Entity\LivestreamFeed[]
     */
    private array $livestreamFeeds = [];

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

    public function getId(): string
    {
        return $this->id;
    }
    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getCallSign(): string
    {
        return $this->callSign;
    }
    public function setCallSign(string $callSign)
    {
        $this->callSign = $callSign;
    }

    public function getFullCommonName(): string
    {
        return $this->fullCommonName;
    }
    public function setFullCommonName(string $fullCommonName)
    {
        $this->fullCommonName = $fullCommonName;
    }

    public function getShortCommonName(): ?string
    {
        return $this->shortCommonName;
    }
    public function setShortCommonName(string $shortCommonName)
    {
        $this->shortCommonName = $shortCommonName;
    }

    public function getTagLine(): ?string
    {
        return $this->tagLine;
    }
    public function setTagLine(string $tagLine)
    {
        $this->tagLine = $tagLine;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }
    public function setTimezone(string $timezone)
    {
        $this->timezone = $timezone;
    }

    public function getSecondaryTimezone(): ?string
    {
        return $this->secondaryTimezone;
    }

    public function setSecondaryTimezone(string $secondaryTimezone)
    {
        $this->secondaryTimezone = $secondaryTimezone;
    }

    public function isPassportEnabled(): ?bool
    {
        return $this->passportEnabled;
    }
    public function setPassportEnabled(bool $passportEnabled)
    {
        $this->passportEnabled = $passportEnabled;
    }

    public function getAnnualPassportQualifyingAmount(): ?float
    {
        return $this->annualPassportQualifyingAmount;
    }
    public function setAnnualPassportQualifyingAmount(float $annualPassportQualifyingAmount)
    {
        $this->annualPassportQualifyingAmount = $annualPassportQualifyingAmount;
    }

    public function getPrimaryChannel(): string
    {
        return $this->primaryChannel;
    }
    public function setPrimaryChannel(string $primaryChannel)
    {
        $this->primaryChannel = $primaryChannel;
    }

    public function getPrimetimeStart(): ?string
    {
        return $this->primetimeStart;
    }
    public function setPrimetimeStart(string $primetimeStart)
    {
        $this->primetimeStart = $primetimeStart;
    }

    public function getTvssUrl(): ?string
    {
        return $this->tvssUrl;
    }
    public function setTvssUrl(string $tvssUrl)
    {
        $this->tvssUrl = $tvssUrl;
    }

    public function getDonateUrl(): ?string
    {
        return $this->donateUrl;
    }
    public function setDonateUrl(string $donateUrl)
    {
        $this->donateUrl = $donateUrl;
    }

    public function getKidsLiveStreamUrl(): ?string
    {
        return $this->kidsLiveStreamUrl;
    }
    public function setKidsLiveStreamUrl(string $kidsLiveStreamUrl)
    {
        $this->kidsLiveStreamUrl = $kidsLiveStreamUrl;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }
    public function setWebsiteUrl(string $websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }

    public function getLearnMorePassportUrl(): ?string
    {
        return $this->learnMorePassportUrl;
    }
    public function setLearnMorePassportUrl(string $learnMorePassportUrl): void
    {
        $this->learnMorePassportUrl = $learnMorePassportUrl;
    }

    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }
    public function setFacebookUrl(?string $facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;
    }

    public function getTwitterUrl(): ?string
    {
        return $this->twitterUrl;
    }
    public function setTwitterUrl(string $twitterUrl)
    {
        $this->twitterUrl = $twitterUrl;
    }

    public function getStationKidsUrl(): ?string
    {
        return $this->stationKidsUrl;
    }
    public function setStationKidsUrl(string $stationKidsUrl)
    {
        $this->stationKidsUrl = $stationKidsUrl;
    }

    public function getPassportUrl(): ?string
    {
        return $this->passportUrl;
    }
    public function setPassportUrl(string $passportUrl)
    {
        $this->passportUrl = $passportUrl;
    }

    public function getVideoPortalUrl(): ?string
    {
        return $this->videoPortalUrl;
    }
    public function setVideoPortalUrl(string $videoPortalUrl)
    {
        $this->videoPortalUrl = $videoPortalUrl;
    }

    public function getVideoPortalBannerUrl(): ?string
    {
        return $this->videoPortalBannerUrl;
    }
    public function setVideoPortalBannerUrl(string $videoPortalBannerUrl)
    {
        $this->videoPortalBannerUrl = $videoPortalBannerUrl;
    }

    public function isPdp(): ?bool
    {
        return $this->pdp;
    }
    public function setPdp(bool $pdp)
    {
        $this->pdp = $pdp;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }
    public function setAddressLine1(string $addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }
    public function setAddressLine2(string $addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }
    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }
    public function setZipCode(string $zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }
    public function setFax(string $fax)
    {
        $this->fax = $fax;
    }

    public function getImages(): array
    {
        return $this->images;
    }
    public function setImages(array $images)
    {
        $this->images = $images;
    }

    public function getPageTracking(): ?string
    {
        return $this->pageTracking;
    }

    public function setPageTracking(string $pageTracking)
    {
        $this->pageTracking = $pageTracking;
    }

    public function getEventTracking(): ?string
    {
        return $this->eventTracking;
    }
    public function setEventTracking(string $eventTracking)
    {
        $this->eventTracking = $eventTracking;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getGaLiveStreamUrl(): ?string
    {
        return $this->gaLiveStreamUrl;
    }
    public function setGaLiveStreamUrl(string $gaLiveStreamUrl): void
    {
        $this->gaLiveStreamUrl = $gaLiveStreamUrl;
    }

    public function isDisplayLogoOverlay(): bool
    {
        return $this->displayLogoOverlay;
    }
    public function setDisplayLogoOverlay(bool $displayLogoOverlay): void
    {
        $this->displayLogoOverlay = $displayLogoOverlay;
    }

    public function getGaLiveStreamFeedCid(): ?string
    {
        return $this->gaLiveStreamFeedCid;
    }
    public function setGaLiveStreamFeedCid(string $gaLiveStreamFeedCid): void
    {
        $this->gaLiveStreamFeedCid = $gaLiveStreamFeedCid;
    }

    public function getPlayerCode(): ?string
    {
        return $this->playerCode;
    }
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
