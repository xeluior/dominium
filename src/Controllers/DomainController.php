<?php

namespace Dominium\Controllers;

class DomainController {
  public function index() {
    $conn = libvirt_connect('qemu:///session');
    $domain_res = libvirt_list_domain_resources($conn);
    $domains = (function() use($domain_res) {
      foreach ($domain_res as $domain) {
        $uuid = libvirt_domain_get_uuid_string($domain);
        $name = libvirt_domain_get_name($domain);
        yield $uuid => $name;
      }
    })();

    render('domains/index', $domains);
  }
}
