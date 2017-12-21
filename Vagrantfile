# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  if (/cygwin|mswin|mingw|bccwin|wince|emx/ =~ RUBY_PLATFORM) != nil
    config.vm.synced_folder ".", "/vagrant", mount_options: ["dmode=700,fmode=600"]
  else
    config.vm.synced_folder ".", "/vagrant"
  end
  config.vm.define "dev" do |d|
    d.vm.box = "ubuntu/trusty64"
    d.vm.hostname = "dev"
    d.vm.network "private_network", ip: "10.100.198.200"
    d.vm.provision :shell, path: "ansible/scripts/bootstrap_ansible.sh"
    d.vm.provision :shell, inline: "PYTHONUNBUFFERED=1 ansible-playbook /vagrant/ansible/vagrant.yml -c local"
    d.vm.provider "virtualbox" do |v|
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]            
      v.memory = 2048
    end
  end
  config.vm.define "prod" do |d|
    d.vm.box = "ubuntu/trusty64"
    d.vm.hostname = "prod"
    d.vm.network "private_network", ip: "10.100.198.201"
    d.vm.provider "virtualbox" do |v|
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]     
      v.memory = 1024
    end
  end

  config.vm.define "gitlab" do |d|
    d.vm.box = "ubuntu/trusty64"
    d.vm.hostname = "gitlab"
    d.vm.network "private_network", ip: "10.100.198.203"
    d.vm.provider "virtualbox" do |v|
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
      v.memory = 4096
    end
  end


  if Vagrant.has_plugin?("vagrant-cachier")
    config.cache.scope = :box
  end
  if Vagrant.has_plugin?("vagrant-vbguest")
    config.vbguest.auto_update = false
    config.vbguest.no_install = true
    config.vbguest.no_remote = true
  end
end
