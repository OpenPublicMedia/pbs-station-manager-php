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
    private string $playerCode;
    private string $cid;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private string $associatedTvssFeed;
    private string $nonDrmUrl;
    private string $drmHlsUrl;
    private string $drmDashUrl;
    private string $fairplayLicense;
    private string $fairplayCertificate;
    private string $widevineLicense;
    private string $playreadyLicense;
    private bool $logoOverlay;

    /**
     * @return string
     */
    public function getProfile(): string
    {
        return $this->profile;
    }

    /**
     * @param string $profile
     */
    public function setProfile(string $profile): void
    {
        $this->profile = $profile;
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
     * @return string
     */
    public function getCid(): string
    {
        return $this->cid;
    }

    /**
     * @param string $cid
     */
    public function setCid(string $cid): void
    {
        $this->cid = $cid;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getAssociatedTvssFeed(): string
    {
        return $this->associatedTvssFeed;
    }

    /**
     * @param string $associatedTvssFeed
     */
    public function setAssociatedTvssFeed(string $associatedTvssFeed): void
    {
        $this->associatedTvssFeed = $associatedTvssFeed;
    }

    /**
     * @return string
     */
    public function getNonDrmUrl(): string
    {
        return $this->nonDrmUrl;
    }

    /**
     * @param string $nonDrmUrl
     */
    public function setNonDrmUrl(string $nonDrmUrl): void
    {
        $this->nonDrmUrl = $nonDrmUrl;
    }

    /**
     * @return string
     */
    public function getDrmHlsUrl(): string
    {
        return $this->drmHlsUrl;
    }

    /**
     * @param string $drmHlsUrl
     */
    public function setDrmHlsUrl(string $drmHlsUrl): void
    {
        $this->drmHlsUrl = $drmHlsUrl;
    }

    /**
     * @return string
     */
    public function getDrmDashUrl(): string
    {
        return $this->drmDashUrl;
    }

    /**
     * @param string $drmDashUrl
     */
    public function setDrmDashUrl(string $drmDashUrl): void
    {
        $this->drmDashUrl = $drmDashUrl;
    }

    /**
     * @return string
     */
    public function getFairplayLicense(): string
    {
        return $this->fairplayLicense;
    }

    /**
     * @param string $fairplayLicense
     */
    public function setFairplayLicense(string $fairplayLicense): void
    {
        $this->fairplayLicense = $fairplayLicense;
    }

    /**
     * @return string
     */
    public function getFairplayCertificate(): string
    {
        return $this->fairplayCertificate;
    }

    /**
     * @param string $fairplayCertificate
     */
    public function setFairplayCertificate(string $fairplayCertificate): void
    {
        $this->fairplayCertificate = $fairplayCertificate;
    }

    /**
     * @return string
     */
    public function getWidevineLicense(): string
    {
        return $this->widevineLicense;
    }

    /**
     * @param string $widevineLicense
     */
    public function setWidevineLicense(string $widevineLicense): void
    {
        $this->widevineLicense = $widevineLicense;
    }

    /**
     * @return string
     */
    public function getPlayreadyLicense(): string
    {
        return $this->playreadyLicense;
    }

    /**
     * @param string $playreadyLicense
     */
    public function setPlayreadyLicense(string $playreadyLicense): void
    {
        $this->playreadyLicense = $playreadyLicense;
    }

    /**
     * @return bool
     */
    public function isLogoOverlay(): bool
    {
        return $this->logoOverlay;
    }

    /**
     * @param bool $logoOverlay
     */
    public function setLogoOverlay(bool $logoOverlay): void
    {
        $this->logoOverlay = $logoOverlay;
    }
}
