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
		stage('Tests') {
			steps {
				sh './phpunit tests'
			}
		}
	}
}
