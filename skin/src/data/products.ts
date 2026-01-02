export interface Product {
  id: string;
  name: string;
  price: number;
  image: string;
  category: string;
  skinTypes: string[];
  description: string;
  benefits: string[];
  ingredients: string[];
  howToUse: string[];
  size: string;
}

export const products: Product[] = [
  {
    id: '1',
    name: 'غسول منعش للوجه',
    price: 299,
    image: 'https://images.unsplash.com/photo-1763622499218-37fdfc7a590a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjbGVhbnNlciUyMGJvdHRsZSUyMGNvc21ldGljc3xlbnwxfHx8fDE3NjUzOTc3MTF8MA&ixlib=rb-4.1.0&q=80&w=1080',
    category: 'غسول',
    skinTypes: ['دهنية', 'مختلطة'],
    description: 'غسول منعش ينظف البشرة بعمق ويزيل الشوائب مع الحفاظ على توازن البشرة الطبيعي',
    benefits: [
      'ينظف البشرة بعمق',
      'يزيل الزيوت الزائدة',
      'ينعش البشرة',
      'مناسب للاستخدام اليومي'
    ],
    ingredients: ['حمض الساليسيليك', 'الشاي الأخضر', 'الصبار'],
    howToUse: [
      'بللي وجهك بالماء الفاتر',
      'ضعي كمية صغيرة من الغسول',
      'دلكي بحركات دائرية لطيفة',
      'اشطفي بالماء جيداً'
    ],
    size: '150 مل'
  },
  {
    id: '2',
    name: 'سيروم فيتامين سي',
    price: 499,
    image: 'https://images.unsplash.com/photo-1643379850623-7eb6442cd262?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiZWF1dHklMjBzZXJ1bSUyMGJvdHRsZXxlbnwxfHx8fDE3NjUyOTY0MjZ8MA&ixlib=rb-4.1.0&q=80&w=1080',
    category: 'سيروم',
    skinTypes: ['جميع أنواع البشرة'],
    description: 'سيروم مركز بفيتامين سي يعمل على تفتيح البشرة وتوحيد لونها وحمايتها من علامات التقدم في السن',
    benefits: [
      'يفتح البشرة ويوحد لونها',
      'يقلل من البقع الداكنة',
      'يحفز إنتاج الكولاجين',
      'يحمي من الجذور الحرة'
    ],
    ingredients: ['فيتامين سي النقي', 'حمض الهيالورونيك', 'فيتامين E'],
    howToUse: [
      'نظفي وجهك جيداً',
      'ضعي 3-4 قطرات من السيروم',
      'وزعيه على الوجه والرقبة',
      'انتظري حتى يمتص قبل وضع المرطب'
    ],
    size: '30 مل'
  },
  {
    id: '3',
    name: 'كريم مرطب غني',
    price: 399,
    image: 'https://images.unsplash.com/photo-1667242003558-e42942d2b911?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxmYWNpYWwlMjBjcmVhbSUyMGphcnxlbnwxfHx8fDE3NjUzNDA5Mzd8MA&ixlib=rb-4.1.0&q=80&w=1080',
    category: 'كريم',
    skinTypes: ['جافة', 'حساسة'],
    description: 'كريم مرطب غني يوفر ترطيب عميق ومستمر للبشرة الجافة ويعيد لها نعومتها وحيويتها',
    benefits: [
      'ترطيب عميق ومستمر',
      'يعيد النعومة للبشرة',
      'يهدئ البشرة الحساسة',
      'يقوي حاجز البشرة'
    ],
    ingredients: ['زبدة الشيا', 'السيراميد', 'حمض الهيالورونيك'],
    howToUse: [
      'استخدميه صباحاً ومساءً',
      'ضعيه على بشرة نظيفة',
      'دلكي بلطف حتى الامتصاص الكامل',
      'مناسب للوجه والرقبة'
    ],
    size: '50 مل'
  },
  {
    id: '4',
    name: 'تونر منعش ومنقي',
    price: 249,
    image: 'https://images.unsplash.com/photo-1618478122572-6f943315c08c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxza2luY2FyZSUyMHByb2R1Y3RzJTIwY29zbWV0aWNzfGVufDF8fHx8MTc2NTM5NzcwOXww&ixlib=rb-4.1.0&q=80&w=1080',
    category: 'تونر',
    skinTypes: ['دهنية', 'مختلطة'],
    description: 'تونر منعش ينظف المسام ويقلل من حجمها ويوازن إفراز الزيوت الطبيعية',
    benefits: [
      'ينظف المسام',
      'يقلل من حجم المسام',
      'يوازن إفراز الزيوت',
      'ينعش البشرة'
    ],
    ingredients: ['ماء الورد', 'النياسيناميد', 'الهاماميليس'],
    howToUse: [
      'استخدميه بعد الغسول',
      'ضعيه على قطنة نظيفة',
      'امسحي وجهك ورقبتك بلطف',
      'لا يحتاج للشطف'
    ],
    size: '200 مل'
  },
  {
    id: '5',
    name: 'واقي شمس SPF 50',
    price: 449,
    image: 'https://images.unsplash.com/photo-1616750819574-7e38aa8046fa?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxza2luY2FyZSUyMHJvdXRpbmUlMjBwcm9kdWN0c3xlbnwxfHx8fDE3NjUzOTQ4MDF8MA&ixlib=rb-4.1.0&q=80&w=1080',
    category: 'واقي شمس',
    skinTypes: ['جميع أنواع البشرة'],
    description: 'واقي شمس واسع الطيف يحمي البشرة من الأشعة فوق البنفسجية الضارة ولا يترك أثراً أبيض',
    benefits: [
      'حماية عالية SPF 50',
      'لا يترك أثراً أبيض',
      'خفيف وسريع الامتصاص',
      'مقاوم للماء'
    ],
    ingredients: ['أكسيد الزنك', 'فيتامين E', 'الصبار'],
    howToUse: [
      'ضعيه قبل التعرض للشمس بـ 15 دقيقة',
      'وزعي كمية كافية على الوجه والرقبة',
      'كرري الاستخدام كل ساعتين',
      'استخدميه يومياً حتى في الأيام الغائمة'
    ],
    size: '50 مل'
  },
  {
    id: '6',
    name: 'ماسك الطين المنقي',
    price: 349,
    image: 'https://images.unsplash.com/photo-1618478122572-6f943315c08c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxza2luY2FyZSUyMHByb2R1Y3RzJTIwY29zbWV0aWNzfGVufDF8fHx8MTc2NTM5NzcwOXww&ixlib=rb-4.1.0&q=80&w=1080',
    category: 'ماسك',
    skinTypes: ['دهنية', 'مختلطة'],
    description: 'ماسك طين طبيعي ينظف المسام بعمق ويمتص الزيوت الزائدة ويترك البشرة نقية ومنتعشة',
    benefits: [
      'ينظف المسام بعمق',
      'يمتص الزيوت الزائدة',
      'يقلل من الرؤوس السوداء',
      'ينقي البشرة'
    ],
    ingredients: ['طين البحر الميت', 'الفحم النشط', 'زيت شجرة الشاي'],
    howToUse: [
      'نظفي وجهك جيداً',
      'ضعي طبقة متساوية من الماسك',
      'اتركيه لمدة 10-15 دقيقة',
      'اشطفيه بالماء الفاتر واستخدمي مرطب'
    ],
    size: '100 مل'
  }
];

export const categories = ['جميع المنتجات', 'غسول', 'سيروم', 'كريم', 'تونر', 'واقي شمس', 'ماسك'];
export const skinTypes = ['جميع الأنواع', 'دهنية', 'جافة', 'مختلطة', 'حساسة'];
