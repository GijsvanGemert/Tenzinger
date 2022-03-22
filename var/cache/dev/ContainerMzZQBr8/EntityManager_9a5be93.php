<?php

namespace ContainerMzZQBr8;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHoldera16ea = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer98514 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties37272 = [
        
    ];

    public function getConnection()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getConnection', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getMetadataFactory', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getExpressionBuilder', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'beginTransaction', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getCache', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getCache();
    }

    public function transactional($func)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'transactional', array('func' => $func), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'wrapInTransaction', array('func' => $func), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'commit', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->commit();
    }

    public function rollback()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'rollback', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getClassMetadata', array('className' => $className), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'createQuery', array('dql' => $dql), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'createNamedQuery', array('name' => $name), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'createQueryBuilder', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'flush', array('entity' => $entity), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'clear', array('entityName' => $entityName), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->clear($entityName);
    }

    public function close()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'close', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->close();
    }

    public function persist($entity)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'persist', array('entity' => $entity), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'remove', array('entity' => $entity), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'refresh', array('entity' => $entity), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'detach', array('entity' => $entity), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'merge', array('entity' => $entity), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getRepository', array('entityName' => $entityName), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'contains', array('entity' => $entity), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getEventManager', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getConfiguration', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'isOpen', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getUnitOfWork', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getProxyFactory', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'initializeObject', array('obj' => $obj), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'getFilters', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'isFiltersStateClean', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'hasFilters', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return $this->valueHoldera16ea->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer98514 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHoldera16ea) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHoldera16ea = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHoldera16ea->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, '__get', ['name' => $name], $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        if (isset(self::$publicProperties37272[$name])) {
            return $this->valueHoldera16ea->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera16ea;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHoldera16ea;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera16ea;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHoldera16ea;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, '__isset', array('name' => $name), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera16ea;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHoldera16ea;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, '__unset', array('name' => $name), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera16ea;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHoldera16ea;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, '__clone', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        $this->valueHoldera16ea = clone $this->valueHoldera16ea;
    }

    public function __sleep()
    {
        $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, '__sleep', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;

        return array('valueHoldera16ea');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer98514 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer98514;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer98514 && ($this->initializer98514->__invoke($valueHoldera16ea, $this, 'initializeProxy', array(), $this->initializer98514) || 1) && $this->valueHoldera16ea = $valueHoldera16ea;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHoldera16ea;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHoldera16ea;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
