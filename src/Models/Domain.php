<?php

namespace Dominium\Models;

class Domain {
  private $resource;

  public function __construct($resource) {
    $this->resource = $resource;
  }

  public static function lookup(
    $connection,
    string $name = null,
    string $uuid = null,
    int $id = null
  ) {
    if ($name) {
      return new self(libvirt_domain_lookup_by_name($connection, $name));
    }
    
    if ($uuid) {
      return new self(libvirt_domain_lookup_by_uuid_string($connection, $uuid));
    }

    if ($id) {
      return new self(libvirt_domain_lookup_by_id($connection, $id));
    }

    throw new InvalidArgumentException(
      'One of $name, $uuid, or $id must be specified'
    );
  }

  public function getInfo() {
    return libvirt_domain_get_info($this->resource);
  }

  public function getMaxMemory() {
    return $this->getInfo()['maxMem'];
  }

  public function getMemory() {
    return $this->getInfo()['memory'];
  }

  public function getVCPUs() {
    return $this->getInfo()['nrVirtCpu'];
  }

  public function getName() {
    return libvirt_domain_get_name($this->resource);
  }

  public function getUUID() {
    return libvirt_domain_get_uuid_string($this->resource);
  }

  public function getId() {
    return libvirt_domain_get_id($this->resource);
  }
}
