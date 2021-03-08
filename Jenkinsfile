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
							name 'PLATFORM'
								values 'linux', 'windows', 'mac'
						}
						axis {
							name 'BROWSER'
								values 'firefox', 'chrome', 'safari', 'edge'
						}
					}
				stages {
					stage('Build') {
						steps {
							echo "Do Build for ${PLATFORM} - ${BROWSER}"
						}
					}
					stage('Test') {
						steps {
							echo "Do Test for ${PLATFORM} - ${BROWSER}"
						}
					}
				}
			}
		}
	}
}
