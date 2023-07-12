[![ci-build](https://github.com/antonio8101/fast-curious-laravel-apprunner/actions/workflows/ci.yml/badge.svg)](https://github.com/antonio8101/fast-curious-laravel-apprunner/actions/workflows/ci.yml)

# Laravel AppRunner

This is simply a show off the AWS App Runner service. 

## How to Deploy this REPO as an AWS APPRUNNER

### Create a IAM User
[https://us-east-1.console.aws.amazon.com/iamv2/home?region=eu-central-1#/users](https://us-east-1.console.aws.amazon.com/iamv2/home?region=eu-central-1#/users)

![image](https://github.com/antonio8101/fast-curious-laravel-apprunner/assets/300245/fbd2fb77-d7e5-4cb7-bfe1-19828d4c3bbd)

### Get IAM User Access Key and Secret Key

[https://us-east-1.console.aws.amazon.com/iamv2/home?region=eu-central-1#/users/details/tempuser?section=security_credentials](https://us-east-1.console.aws.amazon.com/iamv2/home?region=eu-central-1#/users/details/tempuser?section=security_credentials)

![image](https://github.com/antonio8101/fast-curious-laravel-apprunner/assets/300245/467694dc-8323-4faf-9ff0-77e2138fec5d)

### Set the keys in to the Github repo settings

[https://github.com/antonio8101/fast-curious-laravel-apprunner/settings/secrets/actions](https://github.com/antonio8101/fast-curious-laravel-apprunner/settings/secrets/actions)

![image](https://github.com/antonio8101/fast-curious-laravel-apprunner/assets/300245/9376d6bd-cde8-429e-9438-d3557d0d4bf1)

### Grant User permission/policy to push
[https://us-east-1.console.aws.amazon.com/iamv2/home#/users/details/tempuser?section=permissions](https://us-east-1.console.aws.amazon.com/iamv2/home#/users/details/tempuser?section=permissions)

![image](https://github.com/antonio8101/fast-curious-laravel-apprunner/assets/300245/5a44ddf6-2cff-46e7-8b15-a9c303c0c002)

```json

{
	"Version": "2012-10-17",
	"Statement": [
		{
			"Sid": "Statement1",
			"Effect": "Allow",
			"Action": [
				"ecr:CompleteLayerUpload",
				"ecr:UploadLayerPart",
				"ecr:InitiateLayerUpload",
				"ecr:BatchCheckLayerAvailability",
				"ecr:PutImage",
				"ecr:BatchGetImage"
			],
			"Resource": "arn:aws:ecr:{ECR-REGION}:{AWS-ACCOUNT}:repository/{REPO-NAME}"
		},
		{
			"Sid": "Statement2",
			"Effect": "Allow",
			"Action": [
				"ecr:GetAuthorizationToken"
			],
			"Resource": "*"
		}
	]
}

```

### Create the Elastic Container Registry

[https://eu-central-1.console.aws.amazon.com/ecr/repositories?region=eu-central-1](https://eu-central-1.console.aws.amazon.com/ecr/repositories?region=eu-central-1)

![image](https://github.com/antonio8101/fast-curious-laravel-apprunner/assets/300245/fec43086-e206-4037-a75b-fa142a0057f9)

### Create a Dockerfile for you .env

[https://github.com/antonio8101/fast-curious-laravel-apprunner/blob/main/Dockerfile](https://github.com/antonio8101/fast-curious-laravel-apprunner/blob/main/Dockerfile)

### Create a Github workflow

[https://github.com/antonio8101/fast-curious-laravel-apprunner/blob/main/.github/workflows/ci.yml](https://github.com/antonio8101/fast-curious-laravel-apprunner/blob/main/.github/workflows/ci.yml)

## Fast-curious-laravel-apprunner is based on Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Simple, fast routing engine.
Powerful dependency injection container.
Multiple back-ends for session and cache storage.
Expressive, intuitive database ORM.
Database agnostic schema migrations.
Robust background job processing.
Real-time event broadcasting.
Laravel is accessible, powerful, and provides tools required for large, robust applications.
