<?php
/** @noinspection PhpUnused */
declare(strict_types=1);


namespace OpenPublicMedia\PbsStationManager\Entity;

use DateTime;

/**
 * Represents a livestream feed object.
 *
 * @package OpenPublicMedia\PbsStationManager\Entity
 */
class LivestreamFeed extends EntityBase
{
    private string $profile;
    private ?string $playerCode = null;
    private string $cid;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private ?string $associatedTvssFeed = null;
    private ?string $nonDrmUrl = null;
    private ?string $drmHlsUrl = null;
    private ?string $drmDashUrl = null;
    private ?string $fairplayLicense = null;
    private ?string $fairplayCertificate = null;
    private ?string $widevineLicense = null;
    private ?string $playreadyLicense = null;
    private bool $logoOverlay;

    public function getProfile(): string
    {
        return $this->profile;
    }
    public function setProfile(string $profile): void
    {
        $this->profile = $profile;
    }

    public function getPlayerCode(): ?string
    {
        return $this->playerCode;
    }
    public function setPlayerCode(string $playerCode): void
    {
        $this->playerCode = $playerCode;
    }

    public function getCid(): string
    {
        return $this->cid;
    }
    public function setCid(string $cid): void
    {
        $this->cid = $cid;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getAssociatedTvssFeed(): ?string
    {
        return $this->associatedTvssFeed;
    }
    public function setAssociatedTvssFeed(string $associatedTvssFeed): void
    {
        $this->associatedTvssFeed = $associatedTvssFeed;
    }

    public function getNonDrmUrl(): ?string
    {
        return $this->nonDrmUrl;
    }
    public function setNonDrmUrl(string $nonDrmUrl): void
    {
        $this->nonDrmUrl = $nonDrmUrl;
    }

    public function getDrmHlsUrl(): ?string
    {
        return $this->drmHlsUrl;
    }
    public function setDrmHlsUrl(string $drmHlsUrl): void
    {
        $this->drmHlsUrl = $drmHlsUrl;
    }

    public function getDrmDashUrl(): ?string
    {
        return $this->drmDashUrl;
    }
    public function setDrmDashUrl(string $drmDashUrl): void
    {
        $this->drmDashUrl = $drmDashUrl;
    }

    public function getFairplayLicense(): ?string
    {
        return $this->fairplayLicense;
    }
    public function setFairplayLicense(string $fairplayLicense): void
    {
        $this->fairplayLicense = $fairplayLicense;
    }

    public function getFairplayCertificate(): ?string
    {
        return $this->fairplayCertificate;
    }
    public function setFairplayCertificate(string $fairplayCertificate): void
    {
        $this->fairplayCertificate = $fairplayCertificate;
    }

    public function getWidevineLicense(): ?string
    {
        return $this->widevineLicense;
    }
    public function setWidevineLicense(string $widevineLicense): void
    {
        $this->widevineLicense = $widevineLicense;
    }

    public function getPlayreadyLicense(): ?string
    {
        return $this->playreadyLicense;
    }
    public function setPlayreadyLicense(string $playreadyLicense): void
    {
        $this->playreadyLicense = $playreadyLicense;
    }

    public function isLogoOverlay(): bool
    {
        return $this->logoOverlay;
    }
    public function setLogoOverlay(bool $logoOverlay): void
    {
        $this->logoOverlay = $logoOverlay;
    }
}
