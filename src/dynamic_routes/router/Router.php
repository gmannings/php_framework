<?php

namespace php_framework\dynamic_routes\router;

use DirectoryIterator;
use php_framework\dynamic_routes\controllers\ControllerInterface;
use ReflectionClass;

class Router {

  /**
   * @var array
   *   Routes indexed by path.
   */
  protected array $routes = [];

  /**
   * @param string $directory
   *
   * @return array
   * @throws \ReflectionException
   */
  public function findControllersWithRoutes(string $directory): array {

    // Scan the directory for PHP files
    foreach (new DirectoryIterator($directory) as $fileInfo) {
      if ($fileInfo->isDot() || $fileInfo->getExtension() !== 'php') {
        continue;
      }

      // Get the class name (assuming one class per file and the class name matches the file name)
      $className = $fileInfo->getBasename('.php');

      // Check if the class implements ControllerInterface
      $reflector = new ReflectionClass($className);
      if ($reflector->implementsInterface(ControllerInterface::class)) {

        // Check each method for the Route attribute
        foreach ($reflector->getMethods() as $method) {
          foreach ($method->getAttributes(Route::class) as $attribute) {
            $routeAttribute = $attribute->newInstance();

            $this->routes[$routeAttribute->path] = new Route(
              $className,
              $routeAttribute->method,
              $routeAttribute
            );
          }
        }
      }
    }

    return $this->routes;
  }

  /**
   * Retrieve the route from a given path.
   *
   * @param string $path
   *
   * @return \php_framework\dynamic_routes\router\Route|null
   */
  public function getRouteByPath(string $path): ?Route {
    return $this->routes[$path] ?? NULL;

  }

}