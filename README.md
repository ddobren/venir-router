# venir-router

A modular PHP router component designed for the Venir Framework.

## About

`venir-router` is designed to facilitate easy and efficient routing for web applications within the Venir Framework. It allows developers to define routes in a modular fashion, improving scalability and manageability of applications.

## Getting Started

### Prerequisites

- Docker
- Docker Compose

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/ddobren/venir-router.git
   ```

2. Navigate to the project directory:

   ```bash
   cd venir-router
   ```

3. Build the Docker image:

   ```bash
   docker build -t venir-router .
   ```

4. Run the container:
   ```bash
   docker run -p 80:80 venir-router
   ```

## Usage

After starting the containers, the router will be available at http://localhost:80 where you can start routing your requests as per the defined routes in your project.
