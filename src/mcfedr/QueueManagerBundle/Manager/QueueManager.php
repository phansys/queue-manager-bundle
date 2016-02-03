<?php
/**
 * Created by mcfedr on 21/03/2014 10:58
 */

namespace Mcfedr\QueueManagerBundle\Manager;

use Mcfedr\QueueManagerBundle\Exception\NoSuchJobException;
use Mcfedr\QueueManagerBundle\Exception\WrongJobException;
use Mcfedr\QueueManagerBundle\Queue\Job;

interface QueueManager
{
    /**
     * @param array $options
     */
    public function __construct(array $options);

    /**
     * Put a new job on a queue
     *
     * @param string $name The service name of the worker that implements {@link \Mcfedr\QueueManagerBundle\Queue\Worker}
     * @param array $arguments Arguments to pass to execute - must be json serializable
     * @param array $options Options for creating the job
     * @return Job
     */
    public function put($name, array $arguments = [], array $options = []);

    /**
     * Remove a job, you should call this when you have finished processing a job
     *
     * @param $job
     * @throws WrongJobException
     * @throws NoSuchJobException
     */
    public function delete(Job $job);
}
