# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.30"
    
  config.vm.define :"ubuntu-gae"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:  
  config.vm.provider "virtualbox" do |vb|
      # Customize the amount of memory on the VM:
      vb.memory = "1024"
      vb.name = "ubuntu-gae"
  end
  
  # Quick and nasty inline shell script to get GAE running. Move it to Ansible et al. at a later date.
  $script = <<-SHELL  
    echo 'Installing python'
    sudo apt-get install -y python2.7 > /dev/null
	sudo ln -s /usr/bin/python2.7 /usr/bin/python
	
	echo 'Downloading Google Cloud SDK'
	wget --quiet https://dl.google.com/dl/cloudsdk/channels/rapid/downloads/google-cloud-sdk-138.0.0-linux-x86_64.tar.gz
	tar -xzf google-cloud-sdk-138.0.0-linux-x86_64.tar.gz
	export CLOUDSDK_PYTHON=python2.7 > /dev/null
	
	echo 'Installing PHP5.6'
	sudo add-apt-repository ppa:ondrej/php
	sudo apt-get -qq update > /dev/null
	sudo apt-get -qq install -y\
	  php5.6-apcu\
	  php5.6-bcmath\
	  php5.6-cgi\
	  php5.6-curl\
	  php5.6-mbstring\
	  php5.6-mcrypt\
	  php5.6-mysql\
	  php5.6-pdo\
	  php5.6-soap\
	  php5.6-xml\
	  php5.6-zip > /dev/null
	
	echo 'Installing Google Cloud SDK'
	~/google-cloud-sdk/install.sh --quiet --rc-path ~/.bashrc --additional-components app-engine-php app-engine-python
	
	echo '\n\n*** Installation complete'
	echo 'Next steps:'
	echo '  1: vagrant ssh'
	echo '  2: gcloud init'
	echo '  3: cd /vagrant/application/hello-world'
	echo '  4: ./launch-gae.sh'
	echo '  5: Go to `192.168.33.30:8080` in your browser'
  SHELL
  
  config.vm.provision "shell", run: "once", inline: $script, privileged: false
end
