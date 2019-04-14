<?php

namespace JS\OrderView\Model\Config;

class PopupBehavior implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'popup', 'label' => __('Popup')],
            ['value' => 'slide', 'label' => __('Slide')]
        ];
    }
}