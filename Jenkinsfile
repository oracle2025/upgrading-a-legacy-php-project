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
		stage('BuildAndTest') {
			matrix {
					axes {
						axis {
							name 'PHP'
								values '5.3', '5.6'
						}
					}
				stages {
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
	/*	stage('php5.6') {
			agent {
				docker { image 'php:5.6' }
			}
			steps {
				sh 'php --version'
			}
		}*/
	}
}
