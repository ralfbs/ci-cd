
# Vagrant mit Ansible

Im Ordner ansible/group_vars sind Variablen für die verschienden Dienste auf den verschiedenen Servern.

- all: diese Playbooks werden immer ausgerollt.
- dev: diese Playbooks werden nur auf den Dev Server ausgerollt.

Eine Übersicht der Server findet sich in ansible/inventories/xxx/hosts


## Vorbereitungen:
- hosts Datei anlegen, in der unter anderem Vagrant eingetragen sind
- ansible.cfg anlegen, um auf interne Hosts hinzuweisen

## Roles einrichten
- Role installieren: ansible-galaxy install -p ./ansible/roles nn.mm

Alternativ können alle roles in der Datei requirements.yml eingetragen werden. 
`ansible-galaxy install -r ./ansible/requirements.yml -p ./ansible/roles`

Alsdann:
- für die Entwicklung:
`ansible-playbook ansible/site.yml -i ansible/inventories/local/hosts`
- um Live Server zu provisionieren:
`ansible-playbook ansible/site.yml -i ansible/inventories/prod/hosts`
oder
`ansible-playbook ansible/typo3.yml -i ansible/inventories/prod/hosts`


# Todo
- php7.1.load (Apache modul kann nicht aktiviert werden. Ggf. vorher laden?

## Anpassen der Roles
- Die meisten Roles definieren Vorgaben in defaults. Diese können pro Host / Gruppe angepasst werden:
Kopieren der Werte in eine der Dateien in group_vars.


## Links
- Best practices / Site Struktur:
http://docs.ansible.com/ansible/playbooks_best_practices.html

- Ein Beispiel für LAMP und mehrere Server 
https://github.com/geerlingguy/ansible-for-devops/tree/master/lamp-infrastructure

- Basic PHP Application with Ansible: 
https://www.digitalocean.com/community/tutorials/how-to-deploy-a-basic-php-application-using-ansible-on-ubuntu-14-04

- Ansible und Vagrant:
http://www.thedreaming.org/2014/11/04/vagrant-ansible/

- Anvisle und Vagrant:
https://github.com/heybigname/ansible