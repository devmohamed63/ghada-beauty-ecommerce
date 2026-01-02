export interface RoutineStep {
  step: number;
  title: string;
  description: string;
  productId: string;
}

export interface SkinRoutine {
  type: string;
  morning: RoutineStep[];
  evening: RoutineStep[];
}

export const skinRoutines: SkinRoutine[] = [
  {
    type: 'دهنية',
    morning: [
      {
        step: 1,
        title: 'غسول الوجه',
        description: 'نظفي وجهك بغسول مناسب للبشرة الدهنية لإزالة الزيوت الزائدة',
        productId: '1'
      },
      {
        step: 2,
        title: 'تونر',
        description: 'استخدمي تونر لتصغير المسام وموازنة البشرة',
        productId: '4'
      },
      {
        step: 3,
        title: 'سيروم',
        description: 'ضعي سيروم فيتامين سي لتفتيح البشرة وحمايتها',
        productId: '2'
      },
      {
        step: 4,
        title: 'واقي الشمس',
        description: 'احمي بشرتك من أشعة الشمس الضارة',
        productId: '5'
      }
    ],
    evening: [
      {
        step: 1,
        title: 'غسول الوجه',
        description: 'نظفي وجهك جيداً لإزالة المكياج والشوائب',
        productId: '1'
      },
      {
        step: 2,
        title: 'تونر',
        description: 'استخدمي التونر لتنظيف المسام',
        productId: '4'
      },
      {
        step: 3,
        title: 'سيروم',
        description: 'ضعي السيروم لتغذية البشرة أثناء النوم',
        productId: '2'
      }
    ]
  },
  {
    type: 'جافة',
    morning: [
      {
        step: 1,
        title: 'غسول لطيف',
        description: 'استخدمي غسول لطيف لا يجفف البشرة',
        productId: '1'
      },
      {
        step: 2,
        title: 'سيروم مرطب',
        description: 'ضعي سيروم يحتوي على حمض الهيالورونيك',
        productId: '2'
      },
      {
        step: 3,
        title: 'كريم مرطب',
        description: 'استخدمي كريم مرطب غني لترطيب عميق',
        productId: '3'
      },
      {
        step: 4,
        title: 'واقي الشمس',
        description: 'احمي بشرتك من الجفاف الناتج عن الشمس',
        productId: '5'
      }
    ],
    evening: [
      {
        step: 1,
        title: 'غسول لطيف',
        description: 'نظفي بشرتك بلطف',
        productId: '1'
      },
      {
        step: 2,
        title: 'سيروم',
        description: 'ضعي السيروم لتغذية البشرة',
        productId: '2'
      },
      {
        step: 3,
        title: 'كريم ليلي',
        description: 'استخدمي كريم مرطب غني للترطيب طوال الليل',
        productId: '3'
      }
    ]
  },
  {
    type: 'مختلطة',
    morning: [
      {
        step: 1,
        title: 'غسول متوازن',
        description: 'نظفي وجهك بغسول يوازن بين الجفاف والدهون',
        productId: '1'
      },
      {
        step: 2,
        title: 'تونر',
        description: 'استخدمي تونر لتوازن البشرة',
        productId: '4'
      },
      {
        step: 3,
        title: 'سيروم',
        description: 'ضعي سيروم خفيف على كامل الوجه',
        productId: '2'
      },
      {
        step: 4,
        title: 'واقي الشمس',
        description: 'احمي بشرتك من أشعة الشمس',
        productId: '5'
      }
    ],
    evening: [
      {
        step: 1,
        title: 'غسول الوجه',
        description: 'نظفي وجهك جيداً',
        productId: '1'
      },
      {
        step: 2,
        title: 'تونر',
        description: 'استخدمي التونر',
        productId: '4'
      },
      {
        step: 3,
        title: 'كريم مرطب',
        description: 'رطبي المناطق الجافة فقط',
        productId: '3'
      }
    ]
  },
  {
    type: 'حساسة',
    morning: [
      {
        step: 1,
        title: 'غسول لطيف',
        description: 'استخدمي غسول خالي من العطور والمواد القاسية',
        productId: '1'
      },
      {
        step: 2,
        title: 'سيروم مهدئ',
        description: 'ضعي سيروم يحتوي على مكونات مهدئة',
        productId: '2'
      },
      {
        step: 3,
        title: 'كريم مرطب',
        description: 'استخدمي كريم مرطب مهدئ للبشرة الحساسة',
        productId: '3'
      },
      {
        step: 4,
        title: 'واقي شمس معدني',
        description: 'احمي بشرتك بواقي شمس مناسب للبشرة الحساسة',
        productId: '5'
      }
    ],
    evening: [
      {
        step: 1,
        title: 'غسول لطيف',
        description: 'نظفي بشرتك بلطف شديد',
        productId: '1'
      },
      {
        step: 2,
        title: 'سيروم',
        description: 'ضعي سيروم مهدئ',
        productId: '2'
      },
      {
        step: 3,
        title: 'كريم مرطب',
        description: 'رطبي بشرتك بكريم غني',
        productId: '3'
      }
    ]
  }
];
