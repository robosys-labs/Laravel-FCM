<?php

namespace LaravelFCM\Request;

/**
 * Class GroupRequest.
 */
class GroupRequest extends BaseRequest
{
    /**
     * @internal
     *
     * @var string
     */
    protected $operation;

    /**
     * @internal
     *
     * @var string
     */
    protected $notificationKeyName;

    /**
     * @internal
     *
     * @var string
     */
    protected $notificationKey;

    /**
     * @internal
     *
     * @var array
     */
    protected $registrationIds;

    /**
     * GroupRequest constructor.
     *
     * @param $operation
     * @param $notificationKeyName
     * @param $notificationKey
     * @param $registrationIds
     * @param string $config_key
     */
    public function __construct($operation, $notificationKeyName, $notificationKey, $registrationIds, $config_key = 'fcm.http')
    {
        parent::__construct($config_key);

        $this->operation = $operation;
        $this->notificationKeyName = $notificationKeyName;
        $this->notificationKey = $notificationKey;
        $this->registrationIds = $registrationIds;
    }

    /**
     * Build the header for the request.
     *
     * @return array
     */
    protected function buildBody()
    {
        return [
            'operation' => $this->operation,
            'notification_key_name' => $this->notificationKeyName,
            'notification_key' => $this->notificationKey,
            'registration_ids' => $this->registrationIds,
        ];
    }
}
