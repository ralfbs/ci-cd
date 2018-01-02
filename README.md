TDD / CI / CD - Demonstration Stack
===================================

Author: Ralf Schneider

Dies Repository enthält Beispieldaten zur Demonstration eines CI/CD Stacks.


dev Rechner provisionieren
--------------------------
```
vagrant up dev
vagrant ssh dev
// ansible-playbook /vagrant/ansible/vagrant.yml -c local
```

- MailHog abrufen: http://10.100.198.200:8025


# Beispielprojekt 

`git clone https://gitlab.com/gitlab-examples/php src`


gitlab
------
```
vagrant up gitlab
vagrant ssh dev
ansible-playbook /vagrant/ansible/gitlab.yml -i /vagrant/ansible/hosts/prod
```

in /etc/hosts:
`10.100.198.203	gitlab`

- Login Details
* user: root
* password: password

- Check
`sudo gitlab-ctl restart`
`sudo gitlab-rake gitlab:check`

-  ssh Key
`ssh-keygen -t rsa -C "your.email@example.com" -b 4096`
`cat ~/.ssh/id_rsa.pub`

- Git
`git remote set-url origin git@gitlab:root/my-project.git`
 
`git push --set-upstream origin master

Deployer
--------
* Installieren:

`composer require --dev deployer/deployer`

`composer require --dev deployphp/receipes`

* Initialisieren:

`vendor/bin/dep init`

* Anpassen: 
Siehe `/dist/deploy`

* Prod Server: git installieren:

`ansible-playbook ansible/prod.yml  -i ansible/hosts/prod`