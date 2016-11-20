<?php
    OW::getRouter()->addRoute(new OW_Route('routing-scores', 'scores', 'SCORES_CTRL_Manager', 'index'));
    OW::getEventManager()->bind('feed.on_item_render', array(SCORES_CLASS_FeedHandler::getInstance(), 'testFunction'));