<?php

namespace Madewithlove\FacebookMessengerPlatform\Api\Requests;

class Send extends AbstractRequest
{
    /**
     * @param $recipient
     * @param $message
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function message($recipient, $message)
    {
        return $this->send($recipient, [
            'text' => $message,
        ]);
    }

    /**
     * @param $recipient
     * @param $url
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function image($recipient, $url)
    {
        $message = [
            'attachment' => [
                'type' => 'image',
                'payload' => [
                    'url' => $url,
                ],
            ],
        ];

        return $this->send($recipient, $message);
    }

    /**
     * @param $recipient
     * @param array $elements
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function generic($recipient, $elements = [])
    {
        $message = [
            'attachment' => [
                'type' => 'template',
                'payload' => [
                    'template_type' => 'generic',
                    'elements' => $elements,
                ],
            ],
        ];

        return $this->send($recipient, $message);
    }

    /**
     * @param $recipient
     * @param array $buttons
     * @param $text
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function buttons($recipient, $buttons = [], $text)
    {
        $payload = [
            'template_type' => 'button',
            'buttons' => $buttons,
        ];

        if ($text) {
            $payload['text'] = $text;
        }

        $message = [
            'attachment' => [
                'type' => 'template',
                'payload' => $payload,
            ],
        ];

        return $this->send($recipient, $message);
    }

    /**
     * @param $recipient
     * @param array $receipt
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function receipt($recipient, $receipt = [])
    {
        $payload = array_merge([
            'template_type' => 'receipt',
        ], $receipt);

        $message = [
            'attachment' => [
                'type' => 'template',
                'payload' => $payload,
            ],
        ];

        return $this->send($recipient, $message);
    }

    /**
     * @param $recipient
     *
     * @return array
     */
    protected function buildRecipientPayload($recipient)
    {
        return [
            'recipient' => [
                'id' => $recipient,
            ],
        ];
    }

    /**
     * @param $recipient
     * @param $message
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function send($recipient, $message)
    {
        return $this->post('me/messages', array_merge(
            $this->buildRecipientPayload($recipient), [
                'message' => $message,
            ]
        ));
    }
}
