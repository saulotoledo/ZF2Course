<?php
namespace Market\Form;

use Zend\Form\Form;

use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Radio;
use Zend\Form\Element\Email;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Captcha;
use Zend\Captcha\Image as ImageCaptcha;

class PostForm extends Form
{
    use CategoryTrait;
    use ExpireDaysTrait;
    use CaptchaTrait;

    public static $cityCodes = array(
        'Aarhus,DK',
        'Abadan,IR',
        'Aberdeen,GB',
        'Aberdeen,US',
        'Hamilton,CA',
        'Odessa,UA',
        'Oerebro,SE',
        'Walvis Bay,ZA',
    );

    public function buildForm()
    {
        $this->setAttribute('method', 'POST');

        $category = new Select('category');
        $category
            ->setLabel('Category')
            ->setValueOptions(array_combine(
                $this->getCategories(),
                $this->getCategories()
            ))
        ;

        $title = new Text('title');
        $title
            ->setLabel('Title')
            ->setAttributes(array(
                'size' => 50,
                'maxLength' => 128,
                'required' => 'required',
                'placeholder' => 'Title',
                'title' => 'Title'
            ))
        ;

        $photo = new Text('photo_filename');
        $photo
            ->setLabel('Photo')
            ->setAttribute('maxlength', 1024)
            ->setAttribute('placeholder', 'Enter a valid image file URL')
        ;

        $name = new Text('contact_name');
        $name
            ->setLabel('Contact Name')
            ->setAttribute('title', 'Contact Name')
            ->setAttribute('size', 50)
            ->setAttribute('maxlength', 255)
        ;

        $email = new Email('contact_email');
        $email
            ->setLabel('Contact Email')
            ->setAttribute('title', 'Contact Email')
            ->setAttribute('size',50)
            ->setAttribute('maxlength', 255)
        ;

        $phone = new Text('contact_phone');
        $phone
            ->setLabel('Contact Phone Number')
            ->setAttribute('title', 'Contact Phone Number')
            ->setAttribute('size', 20)
            ->setAttribute('maxlength', 32)
        ;

        $city = new Select('cityCode');
        $city
            ->setLabel('Nearest City')
            ->setValueOptions(array_combine(
                self::$cityCodes,
                self::$cityCodes
            ))
            ->setAttribute('id', 'cityCode')
        ;

        $price = new Text('price');
        $price
            ->setLabel('Price')
            ->setAttribute('title', 'Price as nnn.nn')
            ->setAttribute('size', 16)
            ->setAttribute('maxlength', 16)
        ;

        $expires = new Radio('expires');
        $expires
            ->setLabel('Expires')
            ->setAttribute('title', 'The expiration date from today')
            ->setAttribute('class', 'expiresButton')
            ->setValueOptions($this->getExpireDays())
        ;

        $deleteCode = new Text('delete_code');
        $deleteCode
            ->setLabel('Delete Code')
            ->setAttribute('title', 'Delete code for this item')
            ->setAttribute('size', 16)
            ->setAttribute('maxlength', 16)
        ;

        $description = new Textarea('description');
        $description
            ->setLabel('Description')
            ->setAttribute('title', 'Description')
            ->setAttribute('rows', 5)
            ->setAttribute('cols', 80)
        ;

        $captchaAdapter = new ImageCaptcha();
        $captchaAdapter
            ->setWordlen(4)
            ->setOptions($this->captchaOptions)
        ;
        $captcha = new Captcha('captcha');
        $captcha
            ->setCaptcha($captchaAdapter)
            ->setLabel('Help us to prevent SPAM!')
            ->setAttribute('class', 'captchaStyle')
            ->setAttribute('title', 'Help us to prevent SPAM')
        ;

        $submit = new Submit('submit');
        $submit->setAttribute('value', 'Post');

        $this
            ->add($category)
            ->add($title)
            ->add($photo)
            ->add($name)
            ->add($email)
            ->add($phone)
            ->add($city)
            ->add($price)
            ->add($expires)
            ->add($deleteCode)
            ->add($description)
            ->add($captcha)
            ->add($submit)
        ;
    }
}
