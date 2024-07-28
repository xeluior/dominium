<?php

class DomainController {
  public function index() {
    $conn = libvirt_connect('qemu:///session');
    $domains = libvirt_list_domains($conn);

    render('domains/index', $domains);
  }
}
