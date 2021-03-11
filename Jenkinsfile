pipeline {
	agent none
	stages {
		stage('Php Version') {
				agent {
				    docker { image "php:5.3" }
				}
			steps {
				sh 'php --version'
			}
		}
		stage('Php Unit') {
				agent {
				    docker { image "php:5.3" }
				}
			steps {
				sh 'curl -L https://phar.phpunit.de/phpunit-4.phar > phpunit'
				sh 'chmod +x phpunit'
				sh './phpunit --version'
			}
		}
		stage('Tests') {
				agent {
				    docker { image "php:5.3" }
				}
			steps {
				sh './phpunit tests'
			}
		}
		stage('BuildAndTest') {
			matrix {
				agent {
				    docker { image "${DOCKER_IMAGE}" }
				}
					axes {
						axis {
							name 'DOCKER_IMAGE'
							values 'php:5.3', 'php:5.6'
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
	}
}
