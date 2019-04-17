<?php

namespace SlmQueueBeanstalkd\Factory;

use Pheanstalk\Pheanstalk;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * PheanstalkFactory
 */
class PheanstalkFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var $beanstalkdOptions \SlmQueueBeanstalkd\Options\BeanstalkdOptions */
        $beanstalkdOptions = $serviceLocator->get('SlmQueueBeanstalkd\Options\BeanstalkdOptions');
        $connectionOptions = $beanstalkdOptions->getConnection();

        return Pheanstalk::create($connectionOptions->getHost(), $connectionOptions->getPort(), $connectionOptions->getTimeout());
    }
}
