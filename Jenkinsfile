pipeline {
	agent {
		dockerfile true
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
		stage('BuildAndTest') {
			matrix {
				agent any
					axes {
						axis {
							name 'PHP'
								values '5.3', '5.6'
						}
					}
				stages {
					agent {
						docker {
							image 'php:${PHP}'
						}
					}
					stage('Build') {
						steps {
							echo "Do Build for ${PHP}"
							sh 'php --version'
						}
					}
					stage('Test') {
						steps {
							echo "Do Test for ${PHP}"
							sh 'php --version'
						}
					}
				}
			}
		}
	}
}
