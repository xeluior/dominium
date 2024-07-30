<?php

namespace Dominium\Controllers;

use Dominium\Models\Domain;

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

    return render('domains/index', $domains);
  }

  public function show($uuid) {
    $conn = libvirt_connect('qemu:///session');
    $domain = Domain::lookup($conn, uuid: $uuid);

    return render('domains/show', $domain);
  }

  public function edit($uuid) {
    $conn = libvirt_connect('qemu:///session');
    $domain = Domain::lookup($conn, uuid: $uuid);

    return render('domains/edit', $domain);
  }
}
