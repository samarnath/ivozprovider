.. _users:

###################
Users configuration
###################

The installation process creates *Alice* and *Bob* users, allowing us
to test internals calls between them without too much effort.

We also skipped most of the setting in **Users** configuration that we will 
define in this section.

As usually, the best way is to edit an existing user and describe each of its 
fields:

*************
Personal data
*************

.. image:: img/users_edit_personal_data.png

.. glossary::

    Name
        Used to identify this user in most of the screens. This is also the 
        name that will be displayed in internal calls made from this user.

    Lastname
        Most of the times this is used to complete the previous field.

    Email
        Email used to send the user's received voicemails. This is also used to 
        identify the user in their portal.

**********
Login Info
**********

.. image:: img/users_edit_login.png

.. glossary::

    Active
        Allows administrators to grant or disable user's acces to the 
        :ref:`user's portal <userportal>`.

    Password
        Password used to access the :ref:`user's portal <userportal>`.

*******************
Basic Configuration
*******************

.. image:: img/users_edit_basic_config.png

.. glossary::

    Terminal
        The available terminals created in :ref:`terminals` are listed here 
        for assignment.

    Extension
        One of the available :ref:`extensions` that this user will display when 
        placing internal calls. While multiple extensions can be routed to the 
        user, only one of them will be presented when the user calls. 

    Outgoing DDI
        As described in :ref:`external_ddi`, determines the number that will 
        present when placing external outgoing calls. 

    Call ACL
        One of the created :ref:`Call ACL <call_permissions>` groups, described 
        it the previous sections.

    Do not disturb
        When this setting is enabled, the user won't receive any call but can 
        still place calls.

    Call waiting
        When this setting is enabled, the user terminal will receive new calls 
        even if it already talking.

*********
Voicemail
*********

.. image:: img/users_edit_vm.png

.. glossary::

    VoiceMail enabled
        Enables or disables the **existance** of a users voicemail.
        This only makes the voicemail available to be routed as described in the 
        section :ref:`forward to voicemail <fwd_to_vm>`.

    Email notification
        Send an email to the configured user address when a new voicemail is 
        received.

    Attach sounds:
        Attach the audio message to the sent email.

**************
Boss-Assistant
**************

.. image:: img/users_edit_boss.png

This feature will turn the user into a boss that can only be directly call by:

- The selected assistant.

- Any exception defined in the whitelist regular expression.

The rest of the calls to *a bos* will be redirected to the assistant.

.. glossary::

    Is boss
        Determines if this user is a boss.

    Assistant
        Who will receive the redirected calls of this boss.

    Whitelist regular expression.
        Regular expresion to match numbers that are allowed to call directly to 
        the boss.

With the setup in the image, every call to *Alice* will be redirected to *Bob*, 
except the ones placed by *Bob* itself and those coming from the number  
945 945 945.

*******************
Group Configuration
*******************

.. image:: img/users_edit_groups.png

As described in the sections :ref:`huntgroups` and :ref:`capture_groups`, the 
user can be part of one or more huntgroups and pickup groups.

Those groups can be configured from the sections :ref:`huntgroups` and 
:ref:`capture_groups` or the user's screen if the groups already exists. 

You can also configure the user's **hunt groups** from the icon in each user 
line of the users list. 

.. image:: img/users_huntgroups.png
    :align: center

*****************
User Call Forward
*****************

The user's call forward can be configured in the following button:

.. image:: img/users_call_fwd.png
    :align: center

.. _fwd_to_vm:

For example, to forward all external calls that are not answered after 15 
seconds, we could configure a call forward like this:

.. image:: img/users_call_fwd2.png
    :align: center

These are the fields and available values:

.. glossary::

    Call Type
        Determines if the forward must be applied to external, internal or any 
        type of call.

    Forward type
        When this forward must be applied:
            - Inconditional: always
            - No answer: when the call is not answered in X seconds
            - Busy: When the user is talking to someone (and call waiting is 
              disabled), when *Do not disturb* is enabled or when the user 
              rejects an incoming call.
            - Not registered: when the user SIP terminal is not registered 
              against IvozProvider.

    Target type
        What route will use the forwaded call.
            - VoiceMail
            - Number (external)
            - Extension (internal)

.. hint:: If we want to forward to other process, we can create an extension 
   routed to that object and use the target type *Extension*. 

