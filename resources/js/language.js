const translations = [
    ["Find Mentors", "শিক্ষক খুঁজুন"],
    ["Notifications", "নোটিফিকেশন"],
    ["Mark all read", "সবগুলো পড়া হয়েছে হিসেবে চিহ্নিত করুন"],
    ["Dark Mode", "ডার্ক মোড"],
    ["Login", "লগইন"],
    ["Profile", "প্রোফাইল"],
    ["Dashboard", "ড্যাশবোর্ড"],
    ["Logout", "লগআউট"],
    ["Register", "নিবন্ধন"],
    ["About Us", "আমাদের সম্পর্কে"],
    ["Contact Us", "যোগাযোগ করুন"],
    ["FAQs", "সাধারণ জিজ্ঞাসা"],
    ["Terms & Conditions", "শর্তাবলী"],
    ["Browse", "ব্রাউজ করুন"],
    ["Browse our community", "আমাদের কমিউনিটি ঘুরে দেখুন"],
    ["Learn one-to-one from experienced mentors, on your schedule and at your pace.", "অভিজ্ঞ মেন্টরের কাছ থেকে নিজের সুবিধামতো সময়ে ও গতিতে একান্তভাবে শিখুন।"],
    ["Search mentors or subjects...", "মেন্টর বা বিষয় খুঁজুন..."],
    ["Search", "খুঁজুন"],
    ["Search...", "খুঁজুন..."],
    ["Sort by", "সাজান"],
    ["Price: Low to High", "দাম: কম থেকে বেশি"],
    ["Price: High to Low", "দাম: বেশি থেকে কম"],
    ["Min ৳", "সর্বনিম্ন ৳"],
    ["Max ৳", "সর্বোচ্চ ৳"],
    ["Apply Filters", "ফিল্টার প্রয়োগ করুন"],
    ["Clear Filters", "ফিল্টার মুছুন"],
    ["View Profile", "প্রোফাইল দেখুন"],
    ["Book Session", "সেশন বুক করুন"],
    ["Send", "পাঠান"],
    ["Save", "সংরক্ষণ করুন"],
    ["Cancel", "বাতিল করুন"],
    ["Close", "বন্ধ করুন"],
    ["Edit", "সম্পাদনা"],
    ["Delete", "মুছে ফেলুন"],
    ["Update", "আপডেট করুন"],
    ["Submit", "জমা দিন"],
    ["Continue", "চালিয়ে যান"],
    ["Back", "ফিরে যান"],
    ["Next", "পরবর্তী"],
    ["Previous", "পূর্ববর্তী"],
    ["Loading...", "লোড হচ্ছে..."],
    ["No results found", "কোনো ফলাফল পাওয়া যায়নি"],
    ["No mentors found", "কোনো মেন্টর পাওয়া যায়নি"],
    ["Name", "নাম"],
    ["Email", "ইমেইল"],
    ["Password", "পাসওয়ার্ড"],
    ["Confirm Password", "পাসওয়ার্ড নিশ্চিত করুন"],
    ["Phone Number", "ফোন নম্বর"],
    ["Message", "বার্তা"],
    ["Subject", "বিষয়"],
    ["Description", "বিবরণ"],
    ["Status", "অবস্থা"],
    ["Date", "তারিখ"],
    ["Time", "সময়"],
    ["Duration", "সময়কাল"],
    ["Amount", "পরিমাণ"],
    ["Hourly Rate (৳)", "প্রতি ঘণ্টার পারিশ্রমিক (৳)"],
    ["Student", "শিক্ষার্থী"],
    ["Mentor", "মেন্টর"],
    ["Students", "শিক্ষার্থীরা"],
    ["Mentors", "মেন্টররা"],
    ["Sessions", "সেশনসমূহ"],
    ["Payments", "পেমেন্টসমূহ"],
    ["Reviews", "রিভিউসমূহ"],
    ["Settings", "সেটিংস"],
    ["Overview", "সারসংক্ষেপ"],
    ["Today", "আজ"],
    ["This month", "এই মাসে"],
    ["Total Earnings", "মোট আয়"],
    ["Total Spent", "মোট খরচ"],
    ["Upcoming Sessions", "আসন্ন সেশন"],
    ["Recent Sessions", "সাম্প্রতিক সেশন"],
    ["No sessions yet", "এখনো কোনো সেশন নেই"],
    ["No reviews yet", "এখনো কোনো রিভিউ নেই"],
    ["Verified", "যাচাইকৃত"],
    ["Pending", "অপেক্ষমাণ"],
    ["Approved", "অনুমোদিত"],
    ["Rejected", "প্রত্যাখ্যাত"],
    ["Completed", "সম্পন্ন"],
    ["Payment", "পেমেন্ট"],
    ["Pay Now", "এখনই পেমেন্ট করুন"],
    ["Payment successful", "পেমেন্ট সফল হয়েছে"],
    ["Request a Session", "সেশনের অনুরোধ করুন"],
    ["Choose a Topic", "একটি বিষয় বেছে নিন"],
    ["Select a mentor", "একজন মেন্টর নির্বাচন করুন"],
    ["Online", "অনলাইন"],
    ["Offline", "অফলাইন"],
    ["English", "ইংরেজি"],
    ["Bengali", "বাংলা"],
    ["📚 About Us", "📚 আমাদের সম্পর্কে"],
    ["About MentorChai", "MentorChai সম্পর্কে"],
    ["Why MentorChai", "কেন MentorChai"],
    ["Why MentorChai?", "কেন MentorChai?"],
    ["Our Benefits", "আমাদের সুবিধাসমূহ"],
    ["Developer Team", "ডেভেলপার টিম"],
    ["How it works", "কীভাবে কাজ করে"],
    ["How does it work?", "কীভাবে কাজ করে?"],
    ["Support", "সাপোর্ট"],
    ["Affordable", "সাশ্রয়ী"],
    ["Topic based", "বিষয়ভিত্তিক"],
    ["Find a mentor now", "এখনই শিক্ষক খুঁজুন"],
    ["Need help at the last minute before an exam?", "পরীক্ষার আগে শেষ মুহূর্তের সহায়তা"],
    ["Need a teacher's help at a critical moment?", "জরুরি মুহূর্তে শিক্ষকের সাহায্য প্রয়োজন?"],
    ["Need a teacher's help?", "একজন শিক্ষকের সাহায্য প্রয়োজন?"],
    ["MentorChai is here for you", "MentorChai আছে আপনার সাথে"],
    ["Need help understanding Calculus the night before an exam? Or Binary Search Algorithm? Need a teacher's help for just one hour to understand Kirchhoff's Laws?", "পরীক্ষার আগের রাতে হঠাৎ Calculus বুঝতে অসুবিধা হচ্ছে? কিংবা Binary Search Algorithm? শুধুমাত্র Kirchhoff's Laws বুঝতে মাত্র এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?"],
    ["How does it work?", "কীভাবে কাজ করে?"],
    ["24/7 Support", "২৪/৭ সাপোর্ট"],
    ["Topic based", "টপিক ভিত্তিক"],
    ["Flexible schedule", "ফ্লেক্সিবল শিডিউল"],
    ["Earn from home", "ঘরে বসে আয়"],
    ["Fast payments", "দ্রুত পেমেন্ট"],
    ["Any subject", "যেকোনো বিষয়"],
    ["Learn exactly what you need, for exactly the time you need.", "যতটুকু সময়, ঠিক ততটুকুর খরচ"],
    ["Affordable sessions", "সাধ্যের ভেতরে সাশ্রয়ী সেশন"],
    ["Not a full course, just the topic you need", "পুরো কোর্স নয়, নির্দিষ্ট টপিক"],
    ["24/7 mentorship", "২৪/৭ মেন্টরশিপ"],
    ["Flexible schedules for mentors", "মেন্টরদের ফ্লেক্সিবল শিডিউল"],
    ["Get matched with a mentor quickly", "দ্রুততম সময়ে মেন্টর ম্যাচিং"],
    ["📚 About us", "📚 আমাদের সম্পর্কে"],
    ["Having trouble understanding a topic the night before an exam?", "পরীক্ষার আগের রাতে হঠাৎ কোনো টপিক বুঝতে অসুবিধা হচ্ছে?"],
    ["Need a teacher's help for a short time?", "কিছুক্ষণের জন্য একজন শিক্ষকের সহায়তা প্রয়োজন?"],
    ["MentorChai is here for situations like these...", "এমন পরিস্থিতিতেই পাশে আছে MentorChai..."],
    ["Traditional e-learning platforms offer only long-term courses, but MentorChai provides instant mentorship. Book an instant mentor whenever and for as long as you need.", "গতানুগতিক ই-লার্নিং প্ল্যাটফর্মগুলো শুধুমাত্র দীর্ঘমেয়াদী কোর্সভিত্তিক লার্নিং অফার করলেও MentorChai আপনাকে ইন্সট্যান্ট মেন্টরশিপ সুবিধা দিচ্ছে। যখন এবং যতটুকু প্রয়োজন, নিজের সুবিধামতো ইন্সট্যান্ট মেন্টর বুক করুন।"],
    ["No worries, MentorChai is here for you!", "ভয় নেই, MentorChai আছে আপনার সাথে!"],
    ["Learn what you need, pay only for the time you use.", "যতটুকু সময়, ঠিক ততটুকুর খরচ"],
    ["Book a mentor for one to four hours and pay only for the scheduled time. No monthly subscriptions or long-term courses.", "সর্বনিম্ন ১ ঘণ্টা থেকে সর্বোচ্চ ৪ ঘণ্টার জন্য মেন্টর বুক করুন এবং শুধু নির্ধারিত সময়ের জন্য ফি দিন। মাসিক সাবস্ক্রিপশন বা দীর্ঘমেয়াদি কোর্সের ঝামেলা নেই।"],
    ["Sessions designed to fit a student's budget.", "ছাত্র-ছাত্রীদের বাজেটের কথা মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে।"],
    ["Get help with just the topic you are having trouble with.", "ঠিক যে টপিকটিতে আপনার সমস্যা রয়েছে, শুধুমাত্র সেটি সমাধানের জন্যই মেন্টরের সাহায্য নিতে পারবেন।"],
    ["Get help from mentors at any time, even late at night or just before an exam.", "গভীর রাত হোক কিংবা পরীক্ষার ঠিক আগের মুহূর্ত—যেকোনো সময়েই মেন্টরদের সাহায্য নিতে পারবেন।"],
    ["University students and professionals can earn from home in their spare time as mentors.", "বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা অবসর সময়ে মেন্টর হিসেবে ঘরে বসেই অর্থ উপার্জন করতে পারবেন।"],
    ["Find the right mentor for your subject and schedule without a long wait.", "দীর্ঘ অপেক্ষা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই মেন্টর খুঁজে পাবেন।"],
    ["❓ Help Center", "❓ সহায়তা কেন্দ্র"],
    ["Frequently Asked Questions", "সচরাচর জিজ্ঞাসিত প্রশ্নসমূহ"],
    ["We have organized common questions and answers to help you. If you cannot find what you are looking for, contact us directly.", "আপনার প্রয়োজনীয় উত্তরগুলো সহজ করতে আমরা সাধারণ প্রশ্ন ও সমাধানগুলো এখানে সাজিয়েছি। আপনার কাঙ্ক্ষিত উত্তরটি খুঁজে না পেলে সরাসরি আমাদের সাথে যোগাযোগ করুন।"],
    ["I need a mentor for a specific subject or topic. What is available?", "আমি কোন কোন বিষয় কিংবা টপিকের জন্য মেন্টর পাবো?"],
    ["Our platform is designed for all types of learners, not just a specific subject, topic, class, or department. New mentors and topics are added regularly. If you need a mentor for a topic that is not listed, you can submit a request from your account.", "আমাদের প্ল্যাটফর্মটি কোনো নির্দিষ্ট বিষয়, টপিক, ক্লাস বা ডিপার্টমেন্টের জন্য নয়, বরং সকল ধরনের শিক্ষার্থীদের জন্য তৈরি। আমাদের প্ল্যাটফর্মে নিয়মিত নতুন মেন্টর ও টপিক যুক্ত হচ্ছেন। আপনার প্রয়োজনের কোনো টপিক তালিকায় না থাকলে অ্যাকাউন্ট থেকে অনুরোধ জানাতে পারবেন।"],
    ["How is the payment for each session determined?", "প্রতি সেশনের পেমেন্ট কীভাবে নির্ধারণ করা হয়?"],
    ["You can book a mentor for 30 minutes, 45 minutes, one hour, or any duration you need. A set price applies to each duration.", "আপনি ৩০ মিনিট, ৪৫ মিনিট, ১ ঘণ্টা বা প্রয়োজনীয় যেকোনো সময়ের জন্য মেন্টর বুক করতে পারবেন। প্রতিটি সময়সীমার জন্য নির্দিষ্ট মূল্য নির্ধারিত রয়েছে।"],
    ["Can I book a mentor at any time, day or night?", "আমি কি দিনে কিংবা রাতে যেকোনো সময় মেন্টর বুক করতে পারবো?"],
    ["Yes, our platform is available 24/7. You can book a mentor at any time, depending on the availability of mentors for your topic.", "জি, আমাদের প্ল্যাটফর্মটি ২৪/৭ চালু রয়েছে। আপনার প্রয়োজনীয় টপিকের মেন্টরদের প্রাপ্যতার ভিত্তিতে দিনে বা রাতে যেকোনো সময় বুক করতে পারবেন।"],
    ["What if I need extra time after a scheduled session?", "নির্ধারিত সেশনের পর অতিরিক্ত সময় প্রয়োজন হলে করণীয় কী?"],
    ["If you need extra time after your scheduled session, you can extend it with an additional payment.", "নির্ধারিত সেশনের পর অতিরিক্ত সময় প্রয়োজন হলে আলাদা পেমেন্টের মাধ্যমে সময় বাড়ানো যাবে।"],
    ["How can I see which mentors are available for a topic?", "কোনো টপিকে কোন কোন মেন্টর অ্যাভেইলেবল—কীভাবে বুঝবো?"],
    ["You can view the list and details of active mentors, then book any mentor you prefer.", "আপনি সক্রিয় মেন্টরদের তালিকা ও বিস্তারিত দেখতে পারবেন। সেখান থেকে পছন্দমতো যেকোনো মেন্টর বুক করতে পারবেন।"],
    ["How do online video sessions work?", "অনলাইন ভিডিও সেশনগুলো কীভাবে সঞ্চালিত হবে?"],
    ["Sessions take place through video calls directly on our website.", "আমাদের ওয়েবসাইটে সরাসরি ভিডিও কলের মাধ্যমে সেশন নেওয়া হবে।"],
    ["Should I pay before or after the session starts?", "পেমেন্ট কী সেশন শুরুর আগে, নাকি পরে করতে হবে?"],
    ["Payment must be completed before the session starts. Your payment books the selected mentor for the chosen duration.", "সেশন শুরুর আগেই পেমেন্ট সম্পন্ন করতে হবে। পেমেন্টের মাধ্যমে নির্দিষ্ট সময়ের জন্য নির্বাচিত মেন্টরকে বুক করা যাবে।"],
    ["Do I need separate software to use MentorChai?", "MentorChai ব্যবহার করতে কোনো আলাদা সফটওয়্যার প্রয়োজন?"],
    ["No special software is needed. You can use all MentorChai features directly from our website.", "না, আলাদা কোনো বিশেষ সফটওয়্যারের প্রয়োজন নেই। আমাদের ওয়েবসাইট থেকেই সব সুবিধা ব্যবহার করতে পারবেন।"],
    ["Have more questions?", "আরও কিছু জানার আছে?"],
    ["Our team is always ready to help with your questions.", "আপনার যেকোনো জিজ্ঞাসায় সহায়তা করতে আমাদের টিম সদা প্রস্তুত।"],
    ["Contact us", "যোগাযোগ করুন"],
    ["📜 Platform guidelines and policies", "📜 প্ল্যাটফর্মের নির্দেশিকা ও নীতিমালা"],
    ["Policies and Terms of Use", "নীতিমালা ও ব্যবহারের শর্তাবলী"],
    ["Mentors and students must follow these terms to maintain a safe and professional environment on MentorChai.", "MentorChai প্ল্যাটফর্মে সুস্থ ও পেশাদার পরিবেশ বজায় রাখতে মেন্টর এবং শিক্ষার্থী উভয়কেই এই শর্তাবলী মেনে চলতে হবে।"],
    ["Mentor Registration Terms", "মেন্টর নিবন্ধন শর্তাবলী"],
    ["Student Terms and Conditions", "শিক্ষার্থীদের শর্তাবলী"],
    ["Registration and Required Documents", "নিবন্ধন ও প্রয়োজনীয় কাগজপত্র"],
    ["The following documents are required to register as a mentor:", "মেন্টর হিসেবে নিবন্ধন করতে নিম্নোক্ত ডকুমেন্টগুলো প্রয়োজন হবে:"],
    ["Copy of National ID (NID) or passport", "জাতীয় পরিচয়পত্র (NID) বা পাসপোর্টের কপি"],
    ["Educational qualification certificate (highest degree)", "শিক্ষাগত যোগ্যতার সনদ (সর্বোচ্চ ডিগ্রি)"],
    ["Proof of professional experience (certificate or portfolio)", "পেশাদার অভিজ্ঞতার প্রমাণ (সার্টিফিকেট বা পোর্টফোলিও)"],
    ["Details of an active bank account", "একটি সক্রিয় ব্যাংক অ্যাকাউন্টের তথ্য"],
    ["Recent passport-size photograph", "সাম্প্রতিক পাসপোর্ট সাইজের ছবি"],
    ["All information must be accurate and truthful. Any false or misleading information may result in immediate account cancellation.", "সকল তথ্য সঠিক ও সত্য হতে হবে। কোনো তথ্য মিথ্যা বা বিভ্রান্তিকর প্রমাণিত হলে অ্যাকাউন্ট তাৎক্ষণিকভাবে বাতিল করা হবে।"],
    ["Session fees and commission", "সেশন ফী ও কমিশন"],
    ["Mentors may set their own session fees, but must not exceed the maximum limit set by the platform.", "মেন্টর তার সেশনের ফী নিজে নির্ধারণ করতে পারবেন, তবে প্ল্যাটফর্ম নির্ধারিত সর্বোচ্চ সীমা অতিক্রম করতে পারবেন না।"],
    ["Professional conduct", "পেশাদার আচরণ"],
    ["Treat students with respect and professionalism at all times.", "শিক্ষার্থীর প্রতি সর্বদা সম্মানজনক ও পেশাদার আচরণ করতে হবে।"],
    ["Discrimination or harassment based on race, religion, gender, or any identity is strictly prohibited.", "জাতি, ধর্ম, লিঙ্গ বা যেকোনো পরিচয়ের ভিত্তিতে বৈষম্য বা হয়রানি সম্পূর্ণ নিষিদ্ধ।"],
    ["A student's personal information must never be shared with a third party.", "শিক্ষার্থীর ব্যক্তিগত তথ্য কোনো অবস্থাতেই তৃতীয় পক্ষের সাথে শেয়ার করা যাবে না।"],
    ["Recording sessions is prohibited", "সেশন রেকর্ডিং নিষিদ্ধ"],
    ["Reviews and ratings", "রিভিউ ও রেটিং"],
    ["Changing terms and account cancellation", "শর্তাবলী পরিবর্তন ও অ্যাকাউন্ট বাতিল"],
    ["Platform contact is required", "প্ল্যাটফর্মের মাধ্যমে যোগাযোগ বাধ্যতামূলক"],
    ["Platform guidelines and policies", "প্ল্যাটফর্মের নির্দেশিকা ও নীতিমালা"],
    ["Student Terms", "শিক্ষার্থীদের শর্তাবলী"],
    ["Join as a student", "শিক্ষার্থী হিসেবে যোগ দিন"],
    ["Click here", "এখানে ক্লিক করুন"],
    ["Find mentors", "মেন্টর খুঁজুন"],
    ["Explore", "এক্সপ্লোর করুন"],
    ["Popular", "জনপ্রিয়"],
    ["Popular topics", "জনপ্রিয় টপিকসমূহ"],
    ["Become a mentor", "মেন্টর হোন"],
    ["Join as a mentor and earn from home", "মেন্টর হিসেবে যুক্ত হোন এবং ঘরে বসে উপার্জন করুন"],
    ["Do you love teaching? Is it difficult to find tutoring opportunities or a suitable schedule? Is it hard to teach outside your home?", "পড়াতে ভালোবাসেন? টিউশনি করানোর সুযোগ অথবা উপযুক্ত সময় মিলছেনা? কিংবা ঘরের বাইরে টিউশনি করানো কষ্টসাধ্য?"],
    ["Become a MentorChai mentor. Teach whenever it suits you, day or night. Connect with students across the country and earn from home.", "MentorChai এর সাথে যুক্ত হোন মেন্টর হিসেবে। নিজের সুবিধামতো সময় অনুযায়ী দিন কিংবা রাত যেকোনো সময়ে মেন্টরশিপ প্রদান করুন। দেশব্যাপী শিক্ষার্থীদের সাথে সংযুক্ত হয়ে ঘরে বসেই অর্থ উপার্জন করুন।"],
    ["Learn more here", "বিস্তারিত জানতে এখানে ক্লিক করুন"],
    ["Online", "অনলাইন"],
    ["People online", "জন অনলাইন"],
    ["📚 About us", "📚 আমাদের সম্পর্কে"],
    ["Having difficulty understanding a topic the night before an exam?", "পরীক্ষার আগের রাতে হঠাৎ কোনো টপিক বুঝতে অসুবিধা হচ্ছে?"],
    ["Need a teacher's help for a little while?", "কিছুক্ষণের জন্য একজন শিক্ষকের সহায়তা প্রয়োজন?"],
    ["Need a teacher's help?", "একজন শিক্ষকের সহায়তা প্রয়োজন?"],
    ["Such situations are exactly why MentorChai is here...", "এমন পরিস্থিতিতেই পাশে আছে MentorChai..."],
    ["Traditional e-learning platforms offer only long-term courses, while MentorChai provides instant mentorship. Book an instant mentor whenever and for as long as you need.", "গতানুগতিক ই-লার্নিং প্ল্যাটফর্মগুলো শুধুমাত্র দীর্ঘমেয়াদী কোর্সভিত্তিক লার্নিং অফার করলেও MentorChai আপনাকে ইন্সট্যান্ট মেন্টরশিপ সুবিধা দিচ্ছে। যখন এবং যতটুকু প্রয়োজন সেই অনুযায়ী ইন্সট্যান্ট মেন্টর বুক করুন নিজের সুবিধা অনুযায়ী।"],
    ["Need help understanding Calculus the night before an exam? Or Binary Search Algorithm? Need a teacher for just an hour to explain Kirchhoff's Laws?", "পরীক্ষার আগের রাতে হঠাৎ Calculus বুঝতে অসুবিধা হচ্ছে? কিংবা Binary Search Algorithm? শুধুমাত্র Kirchhoff's Laws বুঝতে মাত্র এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?"],
    ["Don't worry, MentorChai is here for you!", "ভয় নেই, MentorChai আছে আপনার সাথে!"],
    ["Why MentorChai", "কেন MentorChai"],
    ["Our", "আমাদের"],
    ["Benefits", "সুবিধাসমূহ"],
    ["Support", "সাপোর্ট"],
    ["Mentors", "মেন্টর"],
    ["Topics", "টপিক"],
    ["Pay only for the time you need", "যতটুকু সময়, ঠিক ততটুকুর খরচ"],
    ["Book a mentor for one to four hours and pay only for the scheduled time. No monthly subscriptions or long-term courses.", "সর্বনিম্ন ১ ঘন্টা থেকে সর্বোচ্চ ৪ ঘন্টার জন্য মেন্টর বুক করুন এবং শুধুমাত্র নির্ধারিত সময়টুকুর জন্যই ফি প্রদান করুন। মাসিক সাবস্ক্রিপশন বা দীর্ঘমেয়াদী কোর্সের ঝামেলা নেই।"],
    ["Affordable sessions within your budget", "সাধ্যের ভেতরে সাশ্রয়ী সেশন"],
    ["Mentorship session prices are set with students' budgets in mind. Shorter sessions keep costs affordable.", "ছাত্র-ছাত্রীদের বাজেটের কথা মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে। কম সময়ের সেশন হওয়ায় খরচও একদম হাতের নাগালে।"],
    ["Not a full course, just the topic you need", "পুরো কোর্স নয়, নির্দিষ্ট টপিক"],
    ["Get help from a mentor to solve the specific topic you are having trouble with.", "ঠিক যে টপিকটিতে আপনার সমস্যা রয়েছে, শুধুমাত্র সেটি সমাধানের জন্যই মেন্টরের সাহায্য নিতে পারবেন।"],
    ["Mentorship, 24/7", "২৪/৭ মেন্টরশিপ"],
    ["Get help from mentors at any time, even late at night or just before an exam.", "গভীর রাত হোক কিংবা পরীক্ষার ঠিক আগের মুহূর্ত - যেকোনো সময়েই সাহায্য নিতে পারবেন মেন্টরদের।"],
    ["Flexible schedules for mentors", "মেন্টরদের ফ্লেক্সিবল শিডিউল"],
    ["University students and professionals can earn from home in their spare time as mentors.", "বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা অবসর সময়ে মেন্টর হিসেবে ঘরে বসেই অর্থ উপার্জন করতে পারবেন।"],
    ["Get matched with a mentor quickly", "দ্রুততম সময়ে মেন্টর ম্যাচিং"],
    ["Find a mentor for your topic and schedule without a long wait.", "দীর্ঘ অপেক্ষা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই মেন্টর খুঁজে পাবেন।"],
    ["Developer team", "ডেভেলপার টিম"],
    ["Help at the last minute before an exam", "পরীক্ষার আগে শেষ মুহূর্তের সহায়তা"],
    ["Need help from a teacher at a critical moment?", "জরুরি মুহূর্তে শিক্ষকের সাহায্য প্রয়োজন?"],
    ["Find a teacher now", "এখনই শিক্ষক খুঁজুন"],
    ["Learn more about how it works", "কীভাবে কাজ করে?"],
    ["24/7 support", "২৪/৭ সাপোর্ট"],
    ["Topic based", "টপিক ভিত্তিক"],
    ["Need a mentor for a specific subject or topic?", "আমি কোন কোন বিষয় কিংবা টপিকের জন্য মেন্টর পাবো?"],
    ["You can book a mentor for 30 minutes, 45 minutes, one hour, or any duration you need. A set price applies to each duration.", "আপনি ৩০ মিনিট, ৪৫ মিনিট, ১ ঘন্টা বা প্রয়োজনীয় যেকোনো সময়সীমার জন্য মেন্টর বুক করতে পারবেন। নির্দিষ্ট সময়সীমার জন্য নির্দিষ্ট মূল্য নির্ধারণ করা হয়েছে।"],
    ["Can I book a mentor any time, day or night?", "আমি কি দিনে কিংবা রাতে যেকোনো সময় মেন্টর বুক করতে পারবো?"],
    ["What should I do if I need extra time after a session?", "নির্ধারিত সেশনের পর অতিরিক্ত সময় প্রয়োজন হলে করণীয় কী?"],
    ["How can I see which mentors are available for a topic?", "কোনো টপিকে কোন কোন মেন্টর অ্যাভেইলেবল - কীভাবে বুঝবো?"],
    ["How are online video sessions conducted?", "অনলাইন ভিডিও সেশনগুলো কীভাবে সঞ্চালিত হবে?"],
    ["Do I pay before or after a session starts?", "পেমেন্ট কী সেশন শুরুর আগে, নাকি পরে করতে হবে?"],
    ["Do I need separate software to use MentorChai?", "MentorChai ব্যবহার করতে কোনো আলাদা সফটওয়্যার প্রয়োজন?"],
    ["Learn more about becoming a mentor", "মেন্টর হিসাবে যুক্ত হওয়ার নিয়মকানুন সম্পর্কে বিস্তারিত জানতে"],
    ["Click this link", "এই লিংকে ক্লিক করুন"],
    ["Could you not find an answer?", "আরও কিছু জানার আছে?"],
    ["Our team is always ready to help with any questions.", "আপনার যেকোনো জিজ্ঞাসায় সহায়তা করতে আমাদের টিম সদা প্রস্তুত।"],
    ["Message us", "যোগাযোগ করুন"],
    ["১", "1"],
    ["২", "2"],
    ["৩", "3"],
    ["৪", "4"],
    ["৫", "5"],
    ["৬", "6"],
    ["৭", "7"],
    ["৮", "8"],
    ["৯", "9"],
    ["১০", "10"],
    ["Session fees and commission", "সেশন ফী ও কমিশন"],
    ["Mentors may set their own session fees, but must not exceed the platform's maximum rate.", "মেন্টর তার সেশনের ফী নিজে নির্ধারণ করতে পারবেন, তবে প্ল্যাটফর্ম কর্তৃক নির্ধারিত সর্বোচ্চ সীমার বেশি ফী নির্ধারণ করতে পারবেন না।"],
    ["Full one-hour session:", "পূর্ণ এক ঘণ্টার সেশন:"],
    ["Half-hour session:", "আধা ঘণ্টার সেশন:"],
    ["Platform commission", "প্ল্যাটফর্ম কমিশন"],
    ["Session delivery", "সেশন পরিচালনা"],
    ["Recording sessions", "সেশন রেকর্ডিং"],
    ["Dispute resolution", "দ্বন্দ্ব নিষ্পত্তি"],
    ["Refund policy", "রিফান্ড নীতি"],
    ["Code of conduct", "আচরণবিধি"],
    ["Copyright infringement", "কপিরাইট লঙ্ঘন"],
    ["Complaints", "অভিযোগ"],
    ["Terms acceptance", "শর্তাবলী মেনে চলার অঙ্গীকার"],
    ["By registering, you confirm that you have read and agree to all the terms above.", "নিবন্ধন সম্পন্ন করার মাধ্যমে আপনি উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে।"],
    ["Changing terms and account cancellation", "শর্তাবলী পরিবর্তন ও অ্যাকাউন্ট বাতিল"],
    ["It is prohibited to contact mentors outside the platform.", "প্ল্যাটফর্মের বাইরে যোগাযোগ করা নিষিদ্ধ।"],
    ["Try to contact someone privately", "ব্যক্তিগত যোগাযোগের চেষ্টা করা"],
    ["Exchange information by phone, email, or social media", "ফোন নম্বর, ইমেইল বা সোশ্যাল মিডিয়ার মাধ্যমে তথ্য আদানপ্রদান"],
    ["Arrange separate sessions or payments", "আলাদাভাবে সেশন পরিচালনা বা পেমেন্ট লেনদেনের চেষ্টা করা"],
    ["More details", "বিস্তারিত"],
    ["Flexible schedule", "ফ্লেক্সিবল স্কেডিউল"],
    ["Earn from home", "ঘরে বসে আয়"],
    ["Any subject", "যেকোনো বিষয়"],
    ["Payment", "পেমেন্ট"],
    ["The mentor sets their session fee, subject to the maximum rate set by the platform.", "মেন্টর তার সেশনের ফী নিজে নির্ধারণ করতে পারবেন, তবে প্ল্যাটফর্ম কর্তৃক নির্ধারিত সর্বোচ্চ সীমার বেশি ফী নির্ধারণ করতে পারবেন না।"],
    ["Up to ৳500", "সর্বোচ্চ ৳৫০০"],
    ["Up to ৳300", "সর্বোচ্চ ৳৩০০"],
    ["20% platform commission", "২০% প্ল্যাটফর্ম কমিশন"],
    ["The platform deducts a 20% commission from each session fee. The remaining 80% is added to the mentor's account balance within the specified time.", "প্রতিটি সেশনের মোট ফী থেকে ২০% প্ল্যাটফর্ম কমিশন কেটে নেওয়া হবে। অবশিষ্ট ৮০% নির্দিষ্ট সময়ের মধ্যে মেন্টরের অ্যাকাউন্ট ব্যালেন্সে জমা হবে।"],
    ["The mentor must attend and conduct each session at the scheduled time. Frequent cancellations or absences may result in account suspension. Mentors must teach only within their areas of expertise and must not provide false or misleading information.", "মেন্টরকে নির্ধারিত সময়ে উপস্থিত থেকে সেশন পরিচালনা করতে হবে। ঘন ঘন সেশন বাতিল বা অনুপস্থিতি অ্যাকাউন্ট স্থগিতের কারণ হতে পারে। মেন্টর শুধুমাত্র নিজের দক্ষতার বিষয়ে সেশন নেবেন এবং কোনো ভুল বা বিভ্রান্তিকর তথ্য দেওয়া যাবে না।"],
    ["Ethical conduct", "নৈতিক আচরণ"],
    ["The mentor must treat students with respect and professionalism at all times.", "শিক্ষার্থীর প্রতি সর্বদা সম্মানজনক ও পেশাদার আচরণ করতে হবে।"],
    ["Discrimination or harassment based on race, religion, gender, or any identity is strictly prohibited.", "জাতি, ধর্ম, লিঙ্গ বা যেকোনো পরিচয়ের ভিত্তিতে বৈষম্য বা হয়রানি সম্পূর্ণ নিষিদ্ধ।"],
    ["A student's personal information must never be shared with a third party.", "শিক্ষার্থীর ব্যক্তিগত তথ্য কোনো অবস্থাতেই তৃতীয় পক্ষের সাথে শেয়ার করা যাবে না।"],
    ["All third-party materials used in sessions must comply with intellectual property laws.", "সেশনে ব্যবহৃত যেকোনো তৃতীয় পক্ষের উপকরণের ক্ষেত্রে মেধাস্বত্ব আইন মেনে চলতে হবে।"],
    ["The platform may revise these terms at any time and will notify mentors in advance. The platform may suspend or permanently terminate accounts for any violation.", "প্ল্যাটফর্ম প্রয়োজনে যেকোনো সময় এই শর্তাবলী সংশোধন করতে পারবে এবং মেন্টরকে আগে থেকে জানানো হবে। শর্তাবলীর যেকোনো লঙ্ঘনে প্ল্যাটফর্ম অ্যাকাউন্ট স্থগিত বা স্থায়ীভাবে বাতিল করার অধিকার রাখে।"],
    ["Students may rate and review a mentor after each session. Mentors must not pressure or influence students to give a specific rating. The platform may review accounts that receive consistently poor ratings.", "শিক্ষার্থী প্রতিটি সেশনের পর মেন্টরকে রেটিং ও রিভিউ দিতে পারবেন। মেন্টর কোনোভাবেই শিক্ষার্থীকে নির্দিষ্ট রেটিং দিতে চাপ দিতে বা প্রভাবিত করতে পারবেন না। ধারাবাহিকভাবে খারাপ রেটিং পেলে প্ল্যাটফর্ম অ্যাকাউন্ট পর্যালোচনা করার অধিকার রাখে।"],
    ["Sessions must not be recorded without the platform's permission. Sharing any part of a session with a third party without the student's consent is strictly prohibited.", "প্ল্যাটফর্মের অনুমতি ছাড়া কোনো সেশন রেকর্ড করা যাবে না। শিক্ষার্থীর সম্মতি ব্যতীত সেশনের কোনো অংশ তৃতীয় পক্ষের সাথে শেয়ার করা সম্পূর্ণ নিষিদ্ধ।"],
    ["If a dispute arises between a mentor and student, they must first seek help from the platform's support team. Direct disputes or public complaints on social media violate these terms.", "মেন্টর ও শিক্ষার্থী মধ্যে কোনো বিরোধ দেখা দিলে প্রথমে প্ল্যাটফর্মের সাপোর্ট টিমের মাধ্যমে সমাধানের চেষ্টা করতে হবে। সরাসরি বিবাদে জড়ানো বা সোশ্যাল মিডিয়ায় প্রকাশ্যে অভিযোগ করা শর্তাবলীর লঙ্ঘন হিসেবে গণ্য হবে।"],
    ["Mentors must update their profile promptly when their qualifications, experience, or subjects change. Attempting to attract students with outdated or incorrect information is considered fraud.", "মেন্টরের যোগ্যতা, অভিজ্ঞতা বা বিষয়ে কোনো পরিবর্তন হলে তা যথাসময়ে প্রোফাইলে আপডেট করতে হবে। পুরনো বা ভুল তথ্য দিয়ে শিক্ষার্থী আকৃষ্ট করার চেষ্টা প্রতারণা হিসেবে বিবেচিত হবে।"],
    ["By registering, you confirm that you have read and agree to all the terms above.", "নিবন্ধন সম্পন্ন করার মাধ্যমে আপনি উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে।"],
    ["By registering, the student confirms they have read and agree to all the terms above. These terms may change at any time, and updates will be shared through the platform.", "নিবন্ধন সম্পন্ন করার মাধ্যমে শিক্ষার্থী উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে। শর্তাবলী যেকোনো সময় পরিবর্তন হতে পারে এবং তা প্ল্যাটফর্মের মাধ্যমে জানানো হবে।"],
    ["Cancel before the session starts to receive a full refund. No refund is available after a session begins. If a session is interrupted or canceled because of a technical issue or a mentor device, internet, or other failure, the student is entitled to a full refund.", "সেশন শুরু হওয়ার আগে বাতিল করলে সম্পূর্ণ রিফান্ড পাওয়া যাবে। সেশন একবার শুরু হয়ে গেলে কোনো রিফান্ড প্রযোজ্য হবে না। তবে প্ল্যাটফর্মের কোনো কারিগরি সমস্যা বা মেন্টরের ডিভাইস, ইন্টারনেট বা অন্য যেকোনো ত্রুটির কারণে সেশন ব্যাহত বা বাতিল হলে শিক্ষার্থী সম্পূর্ণ রিফান্ড পাওয়ার অধিকার রাখবেন।"],
    ["Any attempt to contact a mentor outside the platform, exchange information, or arrange private sessions is an unforgivable violation and will result in permanent account closure.", "মেন্টরের সাথে প্ল্যাটফর্মের বাইরে যোগাযোগ, তথ্য আদানপ্রদান বা ব্যক্তিগত সেশন পরিচালনার যেকোনো চেষ্টা ক্ষমার অযোগ্য অপরাধ হিসেবে গণ্য হবে এবং অ্যাকাউন্ট স্থায়ীভাবে বন্ধ করা হবে।"],
    ["Students must treat mentors respectfully during sessions. Abusive, harassing, or objectionable behavior may result in account termination.", "সেশন চলাকালীন মেন্টরের প্রতি সম্মানজনক আচরণ করতে হবে। অশালীন, হয়রানিমূলক বা আপত্তিজনক আচরণ অ্যাকাউন্ট বাতিলের কারণ হবে।"],
    ["Using third-party software is prohibited", "তৃতীয় পক্ষের সফটওয়্যার ব্যবহার নিষিদ্ধ"],
    ["Do not record sessions using third-party screen recorders, screen mirroring, or capture tools. If such a tool is detected, the account will be permanently banned immediately.", "সেশন চলাকালীন কোনো থার্ড পার্টি স্ক্রিন রেকর্ডার, স্ক্রিন মিরর বা ক্যাপচার টুল ব্যবহার করে সেশন রেকর্ড করা যাবে না। এই ধরনের টুল ব্যবহার ডিটেক্ট হলে অ্যাকাউন্ট তাৎক্ষণিকভাবে স্থায়ী নিষিদ্ধ করা হবে।"],
    ["Students may rate sessions honestly and impartially. Intentionally false or harmful reviews are punishable.", "সেশন শেষে সৎ ও নিরপেক্ষভাবে রেটিং দিতে হবে। উদ্দেশ্যমূলকভাবে মিথ্যা বা ক্ষতিকর রিভিউ দেওয়া শাস্তিযোগ্য অপরাধ হিসেবে গণ্য হবে।"],
    ["Session content must not be redistributed", "সেশনের কন্টেন্ট পুনঃবিতরণ নিষিদ্ধ"],
    ["Sharing, uploading, or selling materials or information discussed in a session violates copyright law and is punishable.", "সেশনে আলোচিত কোনো উপকরণ, তথ্য বা কন্টেন্ট অনলাইনে শেয়ার, আপলোড বা বিক্রি করা কপিরাইট আইনের লঙ্ঘন এবং শাস্তিযোগ্য অপরাধ।"],
    ["If you have a complaint about a mentor, report it through the platform's support team. Public disputes on social media or elsewhere violate these terms.", "মেন্টরের বিরুদ্ধে কোনো অভিযোগ থাকলে প্ল্যাটফর্মের সাপোর্ট টিমের মাধ্যমে জানাতে হবে। সোশ্যাল মিডিয়া বা অন্য কোনো মাধ্যমে প্রকাশ্যে বিবাদে জড়ানো শর্তাবলীর লঙ্ঘন।"],
    ["By registering, the student confirms they have read and agree to all the terms above. Terms may change at any time, and updates will be shared through the platform.", "নিবন্ধন সম্পন্ন করার মাধ্যমে শিক্ষার্থী উপরের সকল শর্ত পড়েছেন এবং সম্পূর্ণভাবে মেনে নিয়েছেন বলে গণ্য হবে। শর্তাবলী যেকোনো সময় পরিবর্তন হতে পারে এবং তা প্ল্যাটফর্মের মাধ্যমে জানানো হবে।"],
    ["Join as a mentor", "মেন্টর হিসাবে জয়েন করতে"],
    ["Join as a student", "স্টুডেন্ট হিসাবে জয়েন করতে"],
    ["Student terms", "শিক্ষার্থীদের জন্য শর্তাবলী"],
    ["Registration", "নিবন্ধন"],
    ["The student must register with accurate and truthful information. Any false information may result in immediate account cancellation.", "সঠিক ও সত্য তথ্য দিয়ে নিবন্ধন করতে হবে। মিথ্যা তথ্য প্রমাণিত হলে অ্যাকাউন্ট তাৎক্ষণিকভাবে বাতিল করা হবে।"],
    ["Payment before the session starts", "সেশন শুরুর আগে পেমেন্ট"],
    ["This is an instant live mentorship platform. Payment must be completed before the session starts, otherwise the session will not begin.", "এটি একটি তাৎক্ষণিক লাইভ মেন্টরশিপ প্ল্যাটফর্ম। সেশন শুরুর আগেই পেমেন্ট সম্পন্ন করতে হবে, অন্যথায় সেশন শুরু হবে না।"],
    ["Session cancellation and refunds", "সেশন বাতিল ও রিফান্ড"],
    ["Cancel before the session starts to receive a full refund. No refund is available after a session begins. If a session is interrupted or canceled because of a technical issue or a mentor device, internet, or other failure, the student is entitled to a full refund.", "সেশন শুরু হওয়ার আগে বাতিল করলে সম্পূর্ণ রিফান্ড পাওয়া যাবে। সেশন একবার শুরু হয়ে গেলে কোনো রিফান্ড প্রযোজ্য হবে না। তবে প্ল্যাটফর্মের কোনো কারিগরি সমস্যা বা মেন্টরের ডিভাইস, ইন্টারনেট বা অন্য যেকোনো ত্রুটির কারণে সেশন ব্যাহত বা বাতিল হলে শিক্ষার্থী সম্পূর্ণ রিফান্ড পাওয়ার অধিকার রাখবেন।"],
    ["Strictly prohibited: contacting outside the platform", "প্ল্যাটফর্মের বাইরে যোগাযোগ: কঠোরভাবে নিষিদ্ধ"],
    ["Any attempt to contact a mentor outside the platform, exchange information, or arrange private sessions is an unforgivable violation and will result in permanent account closure.", "মেন্টরের সাথে প্ল্যাটফর্মের বাইরে যোগাযোগ, তথ্য আদানপ্রদান বা ব্যক্তিগত সেশন পরিচালনার যেকোনো চেষ্টা ক্ষমার অযোগ্য অপরাধ হিসেবে গণ্য হবে এবং অ্যাকাউন্ট স্থায়ীভাবে বন্ধ করা হবে।"],
    ["Conduct", "আচরণ"],
    ["Using third-party software is prohibited", "তৃতীয় পক্ষের সফটওয়্যার ব্যবহার নিষিদ্ধ"],
    ["Reviews and ratings", "রিভিউ ও রেটিং"],
    ["Session content redistribution is prohibited", "সেশনের কন্টেন্ট পুনঃবিতরণ নিষিদ্ধ"],
    ["Filing a complaint", "অভিযোগ দাখিল"],
    ["Commitment to comply with the terms", "শর্তাবলী মেনে চলার অঙ্গীকার"],
    ["Join as a mentor", "মেন্টর হিসাবে জয়েন করতে"],
    ["Join as a student", "স্টুডেন্ট হিসাবে জয়েন করতে"],
    ["Suddenly, at a critical moment", "জরুরি মূহুর্তে হঠাৎ"],
    ["a teacher's help", "শিক্ষকের সাহায্য"],
    ["Do you need it?", "প্রয়োজন?"],
    ["Traditional e-learning platforms offer only long-term courses, while MentorChai offers instant mentorship.", "গতানুগতিক ই-লার্নিং প্ল্যাটফর্মগুলো শুধুমাত্র দীর্ঘমেয়াদী কোর্সভিত্তিক লার্নিং অফার করলেও"],
    ["It provides instant mentorship whenever and for as long as you need.", "আপনাকে প্রদান করছে ইন্সট্যান্ট মেন্টরশিপ সুবিধা। যখন এবং যতটুকু প্রয়োজন সেই অনুযায়ী"],
    ["Book an instant mentor at your convenience.", "ইন্সট্যান্ট মেন্টর বুক করুন নিজের সুবিধা অনুযায়ী।"],
    ["Need help understanding Calculus the night before an exam?", "পরীক্ষার আগের রাতে হঠাৎ"],
    ["having trouble understanding it? Or", "বুঝতে অসুবিধা হচ্ছে? কিংবা"],
    ["Only", "শুধুমাত্র"],
    ["Your answers are here to help. We have organized common questions and solutions. If you cannot find what you need, contact us directly.", "আপনার প্রয়োজনীয় উত্তরগুলো সহজ করতে আমরা সাধারণ প্রশ্ন ও সমাধানগুলো এখানে সাজিয়েছি। আপনার কাঙ্ক্ষিত উত্তরটি খুঁজে না পেলে সরাসরি আমাদের সাথে"],
    ["Yes, our platform is available 24/7. Depending on the availability of mentors for your topic, you can book a mentor at any time, day or night.", "জি, আমাদের প্ল্যাটফর্মটি ২৪/৭ কার্যকর রয়েছে। আপনার যে টপিকটির জন্য মেন্টর প্রয়োজন সেই টপিকের মেন্টরদের অ্যাভেইলেবিলিটির ভিত্তিতে দিনে কিংবা রাতে যেকোনো সময়েই আপনি মেন্টর বুক করতে পারবেন।"],
    ["Learn about becoming a mentor", "মেন্টর হিসাবে যুক্ত হওয়ার নিয়মকানুন সম্পর্কে বিস্তারিত জানতে"],
    ["32 people online", "৩২ জন অনলাইন"],
    ["Join as a student", "স্টুডেন্ট হিসাবে জয়েন করুন"],
    ["Affordable", "সাশ্রয়ী"],
    ["Topics", "টপিকসমূহ"],
    ["View available teacher list", "অ্যাভেইলেবল টিচারলিস্ট দেখুন"],
    ["Why us?", "কেন আমরা?"],
    ["Not a full course; learn a specific topic", "পুরো কোর্স নয়, শিখুন নির্দিষ্ট টপিক"],
    ["Flexible schedules for mentors", "মেন্টরদের জন্য ফ্লেক্সিবল স্কেডিউল"],
    ["University students and professionals can work as mentors in their spare time and earn from home.", "বিশ্ববিদ্যালয় শিক্ষার্থী বা পেশাজীবীরা নিজেদের অবসর সময়ে মেন্টর হিসেবে কাজ করতে পারেন এবং ঘরে বসেই অর্থ উপার্জন করতে পারেন।"],
    ["Find mentors easily by subject and schedule without a long wait or complicated process.", "দীর্ঘ অপেক্ষা বা জটিল কোনো প্রক্রিয়ার ঝামেলা ছাড়াই বিষয় এবং সময় অনুযায়ী খুব সহজেই মেন্টর খুঁজে পাবেন।"],
    ["Join as a mentor and earn from home", "যুক্ত হোন এবং ঘরে বসে উপার্জন করুন"],
    ["This month's earnings", "এই মাসে উপার্জন"],
    ["It provides instant mentorship whenever and for as long as you need. Book an instant mentor at your convenience.", "আপনাকে প্রদান করছে ইন্সট্যান্ট মেন্টরশিপ সুবিধা। যখন এবং যতটুকু প্রয়োজন সেই অনুযায়ী ইন্সট্যান্ট মেন্টর বুক করুন নিজের সুবিধা অনুযায়ী।"],
    ["? Only", "? শুধুমাত্র"],
    ["Need a teacher for just one hour to explain this?", "বুঝতে মাত্র এক ঘণ্টার জন্য একজন শিক্ষকের সহায়তা দরকার?"],
    ["Our platform is for all kinds of students, not just a specific subject, topic, class, or department. New mentors join regularly, and new topics are added. If a topic you need is not listed, you can submit a request from your account.", "আমাদের প্ল্যাটফর্মটি কোনো নির্দিষ্ট বিষয়, টপিক, ক্লাস বা ডিপার্টমেন্টের জন্য নয়, বরং সকল ধরনের শিক্ষার্থীদের জন্য ডেভেলপ করা হয়েছে। আমাদের প্ল্যাটফর্মে প্রতিনিয়ত নতুন মেন্টর যুক্ত হচ্ছেন এবং নিয়মিত বিভিন্ন নতুন টপিক সংযুক্ত হচ্ছে। যদি কোনো নির্দিষ্ট টপিকের জন্য আপনার মেন্টর প্রয়োজন হয় কিন্তু সেটি আমাদের টপিকলিস্টে অ্যাভেইলেবল না থাকে, সেক্ষেত্রে আপনি নিজ অ্যাকাউন্ট থেকে আমাদের কাছে রিকুয়েষ্ট রাখতে পারবেন।"],
    ["If a scheduled session ends and you need extra time, you can extend the session by paying an additional fee.", "যদি নির্ধারিত সময়ের সেশনের পর অতিরিক্ত সময় প্রয়োজন হয়, সেক্ষেত্রে আলাদাভাবে অতিরিক্ত পেমেন্টের মাধ্যমে সময়সীমা বৃদ্ধি করা যাবে।"],
    ["You can see a list of available, active mentors and their details, then book any mentor you prefer.", "আপনি অ্যাভেইলেবল এক্টিভ মেন্টরদের লিস্ট এবং তাদের ডিটেইলস দেখতে পাবেন। সেখান থেকে নিজের পছন্দমতো যেকোনো মেন্টরকে বুক করতে পারবেন।"],
    ["Your sessions take place through video calls directly on our website.", "আমাদের ওয়েবসাইট থেকে সরাসরি ভিডিও কলিংয়ের মাধ্যমে আপনাদের সেশনগুলো নেওয়া হবে।"],
    ["Payment must be completed before the session starts. Paying books your chosen mentor for the selected duration.", "সেশন শুরুর পূর্বেই পেমেন্ট সম্পন্ন করতে হবে। মূলত পেমেন্ট করার মাধ্যমেই নির্দিষ্ট সময়ের জন্য আপনি নির্দিষ্ট মেন্টরকে বুক করতে পারবেন।"],
    ["MentorChai does not require any special software. You can use all of its features directly through our website.", "MentorChai ব্যবহার করতে আলাদা কোনো বিশেষ সফটওয়্যার প্রয়োজন নেই। আমাদের ওয়েবসাইটের মাধ্যমেই সরাসরি সকল সুবিধা নিতে পারবেন।"],
    ["How can I join MentorChai as a mentor?", "MentorChai-তে মেন্টর হিসাবে কীভাবে যুক্ত হতে পারি?"],
    ["Contact us →", "যোগাযোগ করুন →"],
    ["Mentors and students must strictly follow these terms to maintain a safe and professional environment on MentorChai.", "MentorChai প্ল্যাটফর্মে সুস্থ ও profesional পরিবেশ বজায় রাখার স্বার্থে মেন্টর এবং শিক্ষার্থী উভয়কেই এই শর্তাবলী কঠোরভাবে মেনে চলতে হবে।"],
    ["Proof of professional experience (certificate, portfolio)", "পেশাদার অভিজ্ঞতার প্রমাণ (সার্টিফিকেট,পোর্টফোলিও)"],
    ["Each session fee includes a platform commission of", "প্রতিটি সেশনের মোট ফী থেকে"],
    ["will be deducted. The remaining", "কেটে নেওয়া হবে। অবশিষ্ট"],
    ["will be added to the mentor's account balance within the specified time.", "নির্দিষ্ট সময়ের মধ্যে মেন্টরের অ্যাকাউন্ট ব্যালেন্সে জমা হবে।"],
    ["Both mentors and students must follow this rule. The following are prohibited outside the platform:", "মেন্টর ও শিক্ষার্থী উভয়কেই এই নিয়ম মেনে চলতে হবে। প্ল্যাটফর্মের বাইরে :"],
    ["Any proven attempt will be treated as an unforgivable violation. Both the mentor and student involved will be permanently banned, with no opportunity to appeal.", "এগুলোর যেকোনো একটি প্রমাণিত হলে সেটি ক্ষমার অযোগ্য লঙ্ঘন হিসেবে গণ্য হবে এবং সংশ্লিষ্ট মেন্টর ও শিক্ষার্থী উভয়কেই স্থায়ীভাবে ব্যান করা হবে। এ বিষয়ে কোনো আপিলের সুযোগ থাকবে না।"],
    ["Mentor profile updates", "মেন্টরের প্রোফাইল আপডেট"],
    ["Mobile Number", "মোবাইল নম্বর"],
    ["Call us directly anytime, day or night", "দিন-রাত যেকোনো সময় সরাসরি আমাদের কল করুন"],
    ["Call Now", "এখনই কল করুন"],
    ["📞 Call Now", "📞 এখনই কল করুন"],
    ["Copy", "কপি করুন"],
    ["Support Email", "সাপোর্ট ইমেইল"],
    ["Help", "সহায়তা"],
    ["Email our support team for any issues or queries", "যেকোনো সমস্যা বা প্রশ্নে আমাদের সাপোর্ট টিমকে ইমেইল করুন"],
    ["Email Us", "আমাদের ইমেইল করুন"],
    ["✉️ Email Us", "✉️ আমাদের ইমেইল করুন"],
    ["Business Email", "ব্যবসায়িক ইমেইল"],
    ["We are always ready at your service. Connect with us through any platform.", "আমরা সবসময় আপনার সেবায় প্রস্তুত। যেকোনো প্ল্যাটফর্মে আমাদের সাথে যোগাযোগ করুন।"],
    ["Send us a message", "আমাদের বার্তা পাঠান"],
    ["📬 CONNECT", "📬 যোগাযোগ"],
    ["Business", "ব্যবসা"],
    ["Contact this email for partnerships, agreements, or business proposals", "অংশীদারত্ব, চুক্তি বা ব্যবসায়িক প্রস্তাবের জন্য এই ইমেইলে যোগাযোগ করুন"],
    ["Message on Whatsapp for a quick response", "দ্রুত উত্তর পেতে WhatsApp-এ বার্তা পাঠান"],
    ["Chat →", "চ্যাট →"],
    ["Follow our Telegram channel to get the latest updates first", "সর্বশেষ আপডেট সবার আগে পেতে আমাদের Telegram চ্যানেল অনুসরণ করুন"],
    ["Message →", "বার্তা →"],
    ["Facebook Page", "Facebook পেজ"],
    ["Follow our Facebook page for regular offers and updates", "নিয়মিত অফার ও আপডেট পেতে আমাদের Facebook পেজ অনুসরণ করুন"],
    ["View Page →", "পেজ দেখুন →"],
    ["Our Address", "আমাদের ঠিকানা"],
    ["View on Google Maps", "Google Maps-এ দেখুন"],
    ["Open Google Maps ↗", "Google Maps খুলুন ↗"],
    ["All rights reserved", "সর্বস্বত্ব সংরক্ষিত"],
    ["Copyright © MentorChai - All rights reserved", "কপিরাইট © MentorChai - সর্বস্বত্ব সংরক্ষিত"],
    ["Your Name", "আপনার নাম"],
    ["Your Email", "আপনার ইমেইল"],
    ["Your Message", "আপনার বার্তা"],
    ["Send Message", "বার্তা পাঠান"],
    ["Login to your account", "আপনার অ্যাকাউন্টে লগইন করুন"],
    ["Login with Google", "Google দিয়ে লগইন করুন"],
    ["Login with GitHub", "GitHub দিয়ে লগইন করুন"],
    ["Continue with email", "ইমেইল দিয়ে চালিয়ে যান"],
    ["Email Address", "ইমেইল ঠিকানা"],
    ["Forgot Password?", "পাসওয়ার্ড ভুলে গেছেন?"],
    ["Forgot password?", "পাসওয়ার্ড ভুলে গেছেন?"],
    ["Remember me", "আমাকে মনে রাখুন"],
    ["Sign in", "সাইন ইন"],
    ["Don't have an account?", "আপনার কি অ্যাকাউন্ট নেই?"],
    ["Create an account", "অ্যাকাউন্ট তৈরি করুন"],
    ["Student Account", "শিক্ষার্থী অ্যাকাউন্ট"],
    ["Start your learning journey today", "আজই আপনার শেখার যাত্রা শুরু করুন"],
    ["Signup with Google", "Google দিয়ে নিবন্ধন করুন"],
    ["Signup with GitHub", "GitHub দিয়ে নিবন্ধন করুন"],
    ["Teacher Account", "শিক্ষক অ্যাকাউন্ট"],
    ["Become a student", "শিক্ষার্থী হিসেবে যোগ দিন"],
    ["Become a teacher", "শিক্ষক হিসেবে যোগ দিন"],
    ["First Name", "নামের প্রথম অংশ"],
    ["Last Name", "নামের শেষ অংশ"],
    ["Full Name", "সম্পূর্ণ নাম"],
    ["I agree to the Terms and Conditions", "আমি শর্তাবলীতে সম্মত"],
    ["Already have an account?", "ইতোমধ্যে অ্যাকাউন্ট আছে?"],
    ["Sign up", "নিবন্ধন করুন"],
    ["OR", "অথবা"],
    ["New to MentorChai?", "MentorChai-তে নতুন?"],
    ["Are you an admin?", "আপনি কি অ্যাডমিন?"],
    ["Login here", "এখানে লগইন করুন"],
    ["Want to join as a Mentor?", "মেন্টর হিসেবে যোগ দিতে চান?"],
    ["Create Mentor Account", "মেন্টর অ্যাকাউন্ট তৈরি করুন"],
    ["Want to join as a Student?", "শিক্ষার্থী হিসেবে যোগ দিতে চান?"],
    ["Create Student Account", "শিক্ষার্থী অ্যাকাউন্ট তৈরি করুন"],
    ["Mentor Account", "মেন্টর অ্যাকাউন্ট"],
    ["Guide students on their journey", "শিক্ষার্থীদের শেখার যাত্রায় সহায়তা করুন"],
    ["✦ As a mentor you get:", "✦ মেন্টর হিসেবে আপনি পাবেন:"],
    ["Set your own rate and enjoy complete flexible scheduling", "নিজের পারিশ্রমিক নির্ধারণ করুন এবং সম্পূর্ণ নমনীয় সময়সূচির সুবিধা নিন"],
    ["I agree to the", "আমি সম্মত"],
    ["Terms and Privacy Policy", "শর্তাবলী ও গোপনীয়তা নীতি"],
    ["Register as Mentor", "মেন্টর হিসেবে নিবন্ধন করুন"],
    ["close", "বন্ধ করুন"],
    ["Notification", "নোটিফিকেশন"],
    ["Got it", "বুঝেছি"],
    ["Create your account", "আপনার অ্যাকাউন্ট তৈরি করুন"],
    ["Confirm Password", "পাসওয়ার্ড নিশ্চিত করুন"],
    ["Minimum 8 characters", "কমপক্ষে ৮ অক্ষর"],
    ["Select your role", "আপনার ভূমিকা নির্বাচন করুন"],
    ["Register as a student", "শিক্ষার্থী হিসেবে নিবন্ধন করুন"],
    ["Register as a mentor", "মেন্টর হিসেবে নিবন্ধন করুন"],
    ["Browse mentors", "মেন্টরদের দেখুন"],
    ["Search mentors", "মেন্টর খুঁজুন"],
    ["Find your mentor", "আপনার মেন্টর খুঁজুন"],
    ["No mentors found. Try adjusting your filters.", "কোনো মেন্টর পাওয়া যায়নি। ফিল্টার পরিবর্তন করে দেখুন।"],
    ["Sort by", "সাজান"],
    ["Price: Low to High", "দাম: কম থেকে বেশি"],
    ["Price: High to Low", "দাম: বেশি থেকে কম"],
    ["Min ৳", "সর্বনিম্ন ৳"],
    ["Max ৳", "সর্বোচ্চ ৳"],
    ["Price Range (Hourly)", "প্রতি ঘণ্টার মূল্যসীমা"],
    ["Rate / Hr", "প্রতি ঘণ্টার পারিশ্রমিক"],
    ["Filter", "ফিল্টার"],
    ["Filters", "ফিল্টারসমূহ"],
    ["Reset", "রিসেট"],
    ["Clear all", "সব মুছুন"],
    ["Apply", "প্রয়োগ করুন"],
    ["View all", "সব দেখুন"],
    ["View details", "বিস্তারিত দেখুন"],
    ["Read more", "আরও পড়ুন"],
    ["Show more", "আরও দেখান"],
    ["Show less", "কম দেখান"],
    ["Years of experience", "কত বছরের অভিজ্ঞতা"],
    ["Education", "শিক্ষাগত যোগ্যতা"],
    ["Skills", "দক্ষতাসমূহ"],
    ["About Me", "আমার সম্পর্কে"],
    ["No detailed bio added", "কোনো বিস্তারিত বায়ো যোগ করা হয়নি"],
    ["No skills added", "কোনো দক্ষতা যোগ করা হয়নি"],
    ["Not set", "নির্ধারিত নয়"],
    ["Choose a mentor", "একজন মেন্টর বেছে নিন"],
    ["Choose a topic", "একটি বিষয় বেছে নিন"],
    ["Select duration", "সময়কাল নির্বাচন করুন"],
    ["Session duration", "সেশনের সময়কাল"],
    ["Additional notes", "অতিরিক্ত নোট"],
    ["Describe what you need help with", "কোন বিষয়ে সহায়তা প্রয়োজন তা লিখুন"],
    ["Request session", "সেশনের অনুরোধ করুন"],
    ["Session requested successfully", "সেশনের অনুরোধ সফলভাবে পাঠানো হয়েছে"],
    ["Choose payment method", "পেমেন্ট পদ্ধতি বেছে নিন"],
    ["Order Summary", "অর্ডারের সারসংক্ষেপ"],
    ["Subtotal", "উপমোট"],
    ["Total", "সর্বমোট"],
    ["Confirm Payment", "পেমেন্ট নিশ্চিত করুন"],
    ["Pay with", "যেভাবে পেমেন্ট করবেন"],
    ["Session Details", "সেশনের বিস্তারিত"],
    ["Join Session", "সেশনে যোগ দিন"],
    ["Start Session", "সেশন শুরু করুন"],
    ["End Session", "সেশন শেষ করুন"],
    ["Approve", "অনুমোদন করুন"],
    ["Reject", "প্রত্যাখ্যান করুন"],
    ["Mark as read", "পড়া হয়েছে হিসেবে চিহ্নিত করুন"],
    ["Mark all read", "সবগুলো পড়া হয়েছে হিসেবে চিহ্নিত করুন"],
    ["See all notifications", "সব নোটিফিকেশন দেখুন"],
    ["No notifications", "কোনো নোটিফিকেশন নেই"],
    ["Profile Information", "প্রোফাইলের তথ্য"],
    ["Personal Information", "ব্যক্তিগত তথ্য"],
    ["Update Profile", "প্রোফাইল আপডেট করুন"],
    ["Change Password", "পাসওয়ার্ড পরিবর্তন করুন"],
    ["Upload Photo", "ছবি আপলোড করুন"],
    ["Change Profile Picture", "প্রোফাইল ছবি পরিবর্তন করুন"],
    ["Profile updated successfully", "প্রোফাইল সফলভাবে আপডেট হয়েছে"],
    ["Welcome back", "আবারও স্বাগতম"],
    ["Welcome", "স্বাগতম"],
    ["4.9 Rated", "রেটিং ৪.৯"],
    ["No data available", "কোনো তথ্য পাওয়া যায়নি"],
    ["Something went wrong", "কিছু একটা সমস্যা হয়েছে"],
    ["Please try again", "অনুগ্রহ করে আবার চেষ্টা করুন"],
    ["Required", "আবশ্যক"],
    ["Optional", "ঐচ্ছিক"],
    ["Select an option", "একটি বিকল্প নির্বাচন করুন"],
    ["Choose file", "ফাইল বেছে নিন"],
    ["Upload", "আপলোড করুন"],
    ["Download", "ডাউনলোড করুন"],
    ["Back to home", "হোমে ফিরে যান"],
    ["Return to Home", "হোমে ফিরে যান"],
    ["Students' budgets are considered when setting mentorship session prices. Shorter sessions make the cost affordable.", "শিক্ষার্থীদের সাধ্যের ব্যাপারটি মাথায় রেখে মেন্টরশিপ সেশনগুলোর খরচ নির্ধারণ করা হয়েছে। কম সময়ের সেশন হওয়ায় খরচও একদম হাতের নাগালে।"],
    ["There is no need to enroll in an unnecessary full course. Get a mentor's help only with the specific topic you are having trouble with.", "অপ্রয়োজনীয় কনটেন্ট বা পুরো কোর্সে ভর্তি হওয়ার প্রয়োজন নেই। ঠিক যে টপিকটিতে সমস্যা রয়েছে, শুধুমাত্র সেটির সমাধানের জন্যই মেন্টরের সাহায্য নিতে পারবেন।"],
    ["as a mentor", "মেন্টর হিসেবে"],
    ["Do you love teaching? Is it difficult to find tutoring opportunities or a schedule that suits you? Is teaching outside your home a challenge?", "পড়াতে ভালোবাসেন? টিউশনি করানোর সুযোগ অথবা উপযুক্ত সময় মিলছেনা? কিংবা ঘরের বাইরে টিউশনি করানো কষ্টসাধ্য?"],
    ["Join MentorChai as a mentor. Teach at a time that suits you, day or night. Connect with students nationwide and earn from home.", "MentorChai এর সাথে যুক্ত হোন মেন্টর হিসেবে। নিজের সুবিধামতো সময় অনুযায়ী দিন কিংবা রাত যেকোনো সময়ে মেন্টরশিপ প্রদান করুন। দেশব্যাপী শিক্ষার্থীদের সাথে সংযুক্ত হয়ে ঘরে বসেই অর্থ উপার্জন করুন।"],
];

const englishToBengali = new Map(
    translations.map(([english, bengali]) => [english, bengali]),
);
const bengaliToEnglish = new Map(
    translations.map(([english, bengali]) => [bengali, english]),
);

const translatableAttributes = [
    "alt",
    "aria-label",
    "placeholder",
    "title",
    "value",
];
const translationSkipSelector =
    "[data-language-toggle], [data-language-skip], code, pre, script, style, textarea";
const ignoredElements = new Set([
    "CODE",
    "PRE",
    "SCRIPT",
    "STYLE",
    "TEXTAREA",
]);

function readSavedLanguage() {
    try {
        return localStorage.getItem("mentorchai.language") === "bn" ? "bn" : "en";
    } catch (error) {
        console.warn("Could not read the saved language preference.", error);
        return "en";
    }
}

function translateValue(value, language) {
    const trimmed = value.trim();
    if (!trimmed) return localizeDigits(value, language);

    const normalized = trimmed.replace(/\s+/g, " ");
    if (language === "en") {
        const mentorCount = normalized.match(/^([0-9০-৯]+\+?)\s+মেন্টর$/);
        if (mentorCount) {
            return `${localizeDigits(mentorCount[1], language)} mentors`;
        }

        const teachingCount = normalized.match(
            /^এবং আরও ([0-9০-৯]+) জন পড়াচ্ছেন$/,
        );
        if (teachingCount) {
            return `and ${localizeDigits(teachingCount[1], language)} more are teaching`;
        }

        const bengaliExperience = normalized.match(
            /^([0-9০-৯]+) বছরের অভিজ্ঞতা$/,
        );
        if (bengaliExperience) {
            return `${localizeDigits(bengaliExperience[1], language)} yrs exp`;
        }
    } else {
        const mentorCount = normalized.match(/^([0-9]+)\s+mentors?$/i);
        if (mentorCount) {
            return `${localizeDigits(mentorCount[1], language)} মেন্টর`;
        }

        const teachingCount = normalized.match(
            /^and ([0-9]+) more are teaching$/i,
        );
        if (teachingCount) {
            return `এবং আরও ${localizeDigits(teachingCount[1], language)} জন পড়াচ্ছেন`;
        }

        const experience = normalized.match(/^(\d+)\s+yrs exp$/i);
        if (experience) {
            return `${localizeDigits(experience[1], language)} বছরের অভিজ্ঞতা`;
        }
    }

    const translation =
        language === "bn"
            ? englishToBengali.get(normalized)
            : bengaliToEnglish.get(normalized);

    if (!translation) return localizeDigits(value, language);

    const leadingWhitespace = value.match(/^\s*/)?.[0] ?? "";
    const trailingWhitespace = value.match(/\s*$/)?.[0] ?? "";
    return `${leadingWhitespace}${localizeDigits(translation, language)}${trailingWhitespace}`;
}

function localizeDigits(value, language) {
    const bengaliDigits = "০১২৩৪৫৬৭৮৯";
    return language === "bn"
        ? value.replace(/\d/g, (digit) => bengaliDigits[Number(digit)])
        : value.replace(/[০-৯]/g, (digit) =>
              String(bengaliDigits.indexOf(digit)),
          );
}

function translateAttributes(element, language) {
    for (const attribute of translatableAttributes) {
        const value = element.getAttribute(attribute);
        if (!value) continue;

        const translated = translateValue(value, language);
        if (translated !== value) element.setAttribute(attribute, translated);
    }
}

function translateNode(node, language) {
    if (node.nodeType === Node.TEXT_NODE) {
        if (node.parentElement?.closest(translationSkipSelector)) {
            return;
        }
        const translated = translateValue(node.nodeValue ?? "", language);
        if (translated !== node.nodeValue) node.nodeValue = translated;
        return;
    }

    if (node.nodeType !== Node.ELEMENT_NODE) return;

    const element = node;
    if (
        ignoredElements.has(element.tagName) ||
        element.closest(translationSkipSelector)
    ) {
        return;
    }

    translateAttributes(element, language);
    element.querySelectorAll("*").forEach((descendant) => {
        if (
            !ignoredElements.has(descendant.tagName) &&
            !descendant.closest(translationSkipSelector)
        ) {
            translateAttributes(descendant, language);
        }
    });

    const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, {
        acceptNode(textNode) {
            const parent = textNode.parentElement;
            if (!parent || ignoredElements.has(parent.tagName)) {
                return NodeFilter.FILTER_REJECT;
            }
            if (parent.closest(translationSkipSelector)) {
                return NodeFilter.FILTER_REJECT;
            }
            return NodeFilter.FILTER_ACCEPT;
        },
    });

    const textNodes = [];
    while (walker.nextNode()) textNodes.push(walker.currentNode);
    textNodes.forEach((textNode) => translateNode(textNode, language));
}

export function initializeLanguageToggle() {
    const button = document.getElementById("language-toggle");
    if (!button) return;

    let language = readSavedLanguage();
    const label = document.getElementById("language-toggle-label");
    const indicator = document.getElementById("language-toggle-indicator");
    const options = button.querySelectorAll("[data-language-option]");

    function updateToggle() {
        document.documentElement.lang = language;
        document.documentElement.dataset.language = language;
        button.dataset.language = language;
        const labelText = language === "en" ? "বাংলা" : "English";
        if (label && label.textContent !== labelText) label.textContent = labelText;
        button.setAttribute("aria-pressed", String(language === "bn"));
        indicator?.classList.toggle("translate-x-9", language === "bn");
        options.forEach((option) => {
            const isActive = option.dataset.languageOption === language;
            option.classList.toggle("text-white", isActive);
            option.classList.toggle("text-[#28666e]", !isActive);
            option.classList.toggle("dark:text-[#0f1f2e]", isActive);
            option.classList.toggle("dark:text-[#4db6c1]", !isActive);
        });

        const targetLanguage = language === "en" ? "Bengali" : "English";
        button.setAttribute("aria-label", `Switch to ${targetLanguage}`);
        button.title = `Switch to ${targetLanguage}`;
    }

    function applyLanguage(root = document.body) {
        if (!root) return;
        translateNode(root, language);
        updateToggle();
    }

    applyLanguage();
    button.addEventListener("click", () => {
        language = language === "en" ? "bn" : "en";
        applyLanguage();
        try {
            localStorage.setItem("mentorchai.language", language);
        } catch (error) {
            console.warn("Could not save the language preference.", error);
        }
    });

    const observer = new MutationObserver((mutations) => {
        for (const mutation of mutations) {
            if (mutation.type === "characterData") {
                translateNode(mutation.target, language);
            } else {
                mutation.addedNodes.forEach((node) => translateNode(node, language));
            }
        }
    });
    observer.observe(document.body, {
        characterData: true,
        childList: true,
        subtree: true,
    });
}
