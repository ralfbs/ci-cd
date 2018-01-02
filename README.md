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

### PhpUnit Beispiel
https://phpunit.de/getting-started-with-phpunit.html

```
// .bashrc
PATH=$PATH:/vagrant/vendor/bin
export PATH
```

### Beispielprojekt 

`git clone https://gitlab.com/gitlab-examples/php src`


gitlab
------
```
vagrant up gitlab
vagrant ssh dev
ansible-playbook /vagrant/ansible/gitlab.yml
```

- ssh Key - wird später auch für Zugriff auf Prod benötigt
`ssh-keygen -t rsa -C "ralf.schneiderl@vagrant" -b 4096`
`cat ~/.ssh/id_rsa.pub`


in /etc/hosts:
`10.100.198.203	gitlab`

- https://gitlab/user/signin
* user: root
* password: password

- Check
`sudo gitlab-ctl restart`
`sudo gitlab-rake gitlab:check`


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

`ansible-playbook ansible/prod.yml`

Jenkins
-------
https://jenkins.io/doc/book/installing/

```
docker run \
  -u root \
  --rm \
  -d \
  -p 8080:8080 \
  -v jenkins-data:/var/jenkins_home \
  -v /var/run/docker.sock:/var/run/docker.sock \
  jenkinsci/blueocean
```

an das Admin Password kommen:
`docker ps` => name des Containers
`docker logs nnn` => Secret