pipeline {
	agent {
		docker { image 'php:5.3' }
	}
	stages {
		stage('Php Version') {
			steps {
				sh 'php --version'
			}
		}
		stage('Php Unit') {
			steps {
				sh 'curl -L https://phar.phpunit.de/phpunit-4.phar > phpunit'
				sh 'chmod +x phpunit'
				sh './phpunit --version'
			}
		}
		stage('Composer') {
			steps {
				sh 'curl -L https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer | php -- --quiet'
				sh 'composer require --dev phpunit/phpunit ^4'
			}
		}
	}
}
