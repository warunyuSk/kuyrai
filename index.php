<!DOCTYPE html>
<html lang="th" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Thailand - ดูซีรีส์ออนไลน์ ดูภาพยนตร์ออนไลน์</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons for Netflix-like layout -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Inter & Prompt for Netflix Look in Thai -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS for specific Netflix styling elements -->
    <style>
        body {
            font-family: 'Prompt', 'Inter', sans-serif;
            background-color: #141414;
            color: #ffffff;
            overflow-x: hidden;
        }
        /* Custom scrollbar matching Netflix style */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #141414;
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        /* Row Carousel Hide Scrollbars but keep functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        /* Netflix Glow Red outline */
        .netflix-input:focus-within {
            outline: 2px solid #E50914;
        }
        /* Custom animations */
        @keyframes scaleUp {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .animate-scaleUp {
            animation: scaleUp 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fadeIn {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
</head>
<body class="bg-[#141414] text-white">

    <script>
        // Netflix Mock Movie Database
        const MOVIE_DATABASE = [
            {
                id: "m1",
                title: "สควิดเกม เล่นลุ้นตาย (Squid Game)",
                category: "trending",
                rating: "98% Match",
                year: "2024",
                age: "18+",
                seasons: "ซีซั่น 2",
                quality: "Ultra HD 4K",
                genres: ["ระทึกขวัญ", "ดราม่า", "ไซไฟ"],
                description: "ผู้เข้าแข่งขันหลายร้อยคนที่มีปัญหาทางการเงินตอบรับคำเชิญปริศนาเพื่อเข้าร่วมเล่นเกมของเด็กที่แสนธรรมดา แต่มีเดิมพันสูงลิ่วและอันตรายถึงชีวิต เพื่อชิงเงินรางวัลมหาศาล",
                backdrop: "https://images.unsplash.com/photo-1627856013091-fed6e4e30025?auto=format&fit=crop&w=1200&q=80",
                logo: "SQUID GAME"
            },
            {
                id: "m2",
                title: "สเตรนเจอร์ ธิงส์ (Stranger Things)",
                category: "trending",
                rating: "97% Match",
                year: "2022",
                age: "16+",
                seasons: "ซีซั่น 4",
                quality: "HDR",
                genres: ["ไซไฟ", "สยองขวัญ", "ย้อนยุค"],
                description: "เมื่อเด็กชายคนหนึ่งหายตัวไปอย่างลึกลับ กลุ่มเพื่อนสนิทของเขาและผู้คนในเมืองเล็กๆ จึงได้เผชิญหน้ากับความลึกลับเหนือธรรมชาติ คดีทดลองลับสุดยอดของรัฐบาล และเด็กสาวประหลาดคนหนึ่ง",
                backdrop: "https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?auto=format&fit=crop&w=1200&q=80",
                logo: "STRANGER THINGS"
            },
            {
                id: "m3",
                title: "เดอะ คราวน์ (The Crown)",
                category: "popular",
                rating: "95% Match",
                year: "2023",
                age: "13+",
                seasons: "ซีซั่น 6",
                quality: "Ultra HD 4K",
                genres: ["ประวัติศาสตร์", "ดราม่า", "การเมือง"],
                description: "ซีรีส์ดราม่าอิงประวัติศาสตร์ที่นำเสนอเรื่องราววงในความขัดแย้ง ความรัก และเหตุการณ์สำคัญทางประวัติศาสตร์ที่หล่อหลอมช่วงเวลาการครองราชย์อันยาวนานของสมเด็จพระราชินีนาถเอลิซาเบธที่ 2",
                backdrop: "https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=1200&q=80",
                logo: "THE CROWN"
            },
            {
                id: "m4",
                title: "แบล็ก มิร์เรอร์ (Black Mirror)",
                category: "popular",
                rating: "94% Match",
                year: "2023",
                age: "18+",
                seasons: "ซีซั่น 6",
                quality: "HD",
                genres: ["ไซไฟ", "จิตวิทยา", "ดาร์กตลก"],
                description: "ซีรีส์กวีนิพนธ์ไซไฟแนวเสียดสีสังคมที่สะท้อนถึงด้านมืดอันน่าสะพรึงกลัวและผลกระทบของเทคโนโลยีล้ำสมัยที่มีต่อมนุษยชาติในโลกอนาคตอันใกล้",
                backdrop: "https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=1200&q=80",
                logo: "BLACK MIRROR"
            },
            {
                id: "m5",
                title: "ออล ออฟ อัส อาร์ เดด (All of Us Are Dead)",
                category: "action",
                rating: "96% Match",
                year: "2022",
                age: "18+",
                seasons: "ซีซั่น 1",
                quality: "HD",
                genres: ["สยองขวัญ", "แอ็คชั่น", "วัยรุ่น"],
                description: "โรงเรียนมัธยมปลายธรรมดาๆ แห่งหนึ่งกลายเป็นจุดเริ่มต้นของไวรัสซอมบี้แพร่ระบาด กลุ่มนักเรียนที่ติดอยู่ข้างในต้องร่วมมือกันต่อสู้และหาทางรอดชีวิตเอาตัวรอดจากการโจมตีอันบ้าคลั่ง",
                backdrop: "https://images.unsplash.com/photo-1509198397868-475647b2a1e5?auto=format&fit=crop&w=1200&q=80",
                logo: "ALL OF US ARE DEAD"
            },
            {
                id: "m6",
                title: "มันนี่ ไฮสต์: ทรชนคนปล้นโลก (Money Heist)",
                category: "action",
                rating: "99% Match",
                year: "2021",
                age: "18+",
                seasons: "ภาค 5",
                quality: "HDR",
                genres: ["อาชญากรรม", "ระทึกขวัญ", "แอ็คชั่น"],
                description: "แผนการปล้นสุดอัจฉริยะนำทีมโดย 'ศาสตราจารย์' ร่วมกับกลุ่มโจรผู้ไร้หนทางสูญเสีย โดยเป้าหมายคือโรงกษาปณ์แห่งสเปน การปะทะคารมเชิงสมองและยุทธวิธีกับตำรวจชั้นนำเริ่มต้นขึ้น",
                backdrop: "https://images.unsplash.com/photo-1505686994434-e3cc5abf1330?auto=format&fit=crop&w=1200&q=80",
                logo: "MONEY HEIST"
            },
            {
                id: "m7",
                title: "ไซเบอร์พังก์: อาชญากรปืนโต (Cyberpunk: Edgerunners)",
                category: "scifi",
                rating: "97% Match",
                year: "2022",
                age: "18+",
                seasons: "ซีซั่น 1",
                quality: "Ultra HD 4K",
                genres: ["อนิเมะ", "ไซไฟ", "ดราม่า"],
                description: "ในเมืองใหญ่แห่งอนาคตที่เต็มไปด้วยผู้คลั่งไคล้เทคโนโลยีและการปรับแต่งร่างกาย เด็กหนุ่มข้างถนนคนหนึ่งดิ้นรนเอาชีวิตรอดโดยการกลายเป็น 'เอ็ดจ์รันเนอร์' หรือทหารรับจ้างนอกกฎหมาย",
                backdrop: "https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=1200&q=80",
                logo: "CYBERPUNK"
            },
            {
                id: "m8",
                title: "ดาร์ก (Dark)",
                category: "scifi",
                rating: "93% Match",
                year: "2020",
                age: "16+",
                seasons: "ซีซั่น 3",
                quality: "HDR",
                genres: ["ไซไฟ", "ปริศนา", "ย้อนเวลา"],
                description: "การหายตัวไปของเด็กสองคนในเมืองเล็กๆ ของเยอรมนี เผยให้เห็นสายสัมพันธ์อันซับซ้อน ความลับดำมืด และการเดินทางข้ามเวลาที่เชื่อมโยงถึงกันของสี่ครอบครัวตลอดสามชั่วอายุคน",
                backdrop: "https://images.unsplash.com/photo-1461360370896-922624d12aa1?auto=format&fit=crop&w=1200&q=80",
                logo: "DARK"
            }
        ];
    </script>

    <!-- Custom Toast Notification instead of alert() -->
    <div id="toast-container" class="fixed top-20 right-5 z-50 pointer-events-none flex flex-col gap-2"></div>

    <script>
        function showToast(message, isSuccess = true) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `flex items-center gap-3 px-4 py-3 rounded-lg shadow-xl text-white text-sm font-medium transition-all duration-300 transform translate-y-5 opacity-0 ${isSuccess ? 'bg-[#E50914]' : 'bg-zinc-800 border border-zinc-700'}`;
            toast.innerHTML = `
                <i class="${isSuccess ? 'fa-solid fa-circle-check text-white' : 'fa-solid fa-triangle-exclamation text-yellow-500'}"></i>
                <span>${message}</span>
            `;
            container.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-y-5', 'opacity-0');
            }, 50);

            // Animate out & remove
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-[-10px]');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>

    <!-- ============================================== -->
    <!-- SECTION 1: NETFLIX LANDING PAGE (UNLOGGED STATE) -->
    <!-- ============================================== -->
    <div id="landing-page" class="relative min-h-screen flex flex-col justify-between overflow-x-hidden">
        
        <!-- Hero Background Cover -->
        <div class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat" style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0.9) 100%), url('https://assets.nflxext.com/ffe/siteui/vlv3/2f5925f4-d27d-4b99-b169-3dc4004c3a94/4b79bebc-41fb-4ca0-985c-0bc7a1a0c7c8/TH-th-20240122-colosseum-perspective_alpha_website_large.jpg');"></div>

        <!-- Landing Navbar -->
        <header class="relative z-10 max-w-7xl mx-auto w-full flex items-center justify-between px-6 py-6 md:px-12">
            <!-- Brand Logo SVG -->
            <div class="flex items-center">
                <svg class="h-6 md:h-10 fill-[#E50914]" viewBox="0 0 111 30" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5 0h4.3v30H10.5zM22.2 0h4.2l8 17.5V0h4.2v30H34.4l-8.2-17.7V30h-4v-30zm20.8 0h12v4.1H47.2v7.6H54v4.1h-6.8v10.1h12V30H43V0zm19.6 0H74v4.1h-6.5v8.5H73v4.1h-5.5V30h-4.3V0zm15.4 0h4.2v25.9h7.4V30H78V0zm15.4 0h4.3v30h-4.3zM100.2 0h4.2l6.6 15-6.6 15h-4.2l6.5-15-6.5-15z"/>
                </svg>
            </div>
            <!-- Action buttons -->
            <div class="flex items-center gap-4">
                <select class="bg-black/60 border border-zinc-500 text-white rounded px-4 py-1.5 text-sm font-medium focus:outline-none focus:border-white">
                    <option value="th">ไทย</option>
                    <option value="en">English</option>
                </select>
                <button onclick="transitionToProfileSelection()" class="bg-[#E50914] hover:bg-[#C11119] text-white px-4 py-1.5 rounded text-sm font-semibold transition duration-150">
                    เข้าสู่ระบบ
                </button>
            </div>
        </header>

        <!-- Landing Hero Text & Form -->
        <main class="relative z-10 flex-grow flex flex-col items-center justify-center text-center px-4 md:px-12 py-16">
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold max-w-4xl tracking-wide leading-tight mb-4">
                ภาพยนตร์ ซีรีส์ และความบันเทิงอีกมากมายแบบไม่จำกัด
            </h1>
            <p class="text-lg md:text-2xl font-light mb-6">
                ดูได้ทุกที่ ยกเลิกได้ทุกเมื่อ
            </p>
            <p class="text-md md:text-xl font-normal max-w-2xl mb-6 text-zinc-300">
                พร้อมรับชมหรือยัง ป้อนอีเมลเพื่อสร้างหรือกลับมาใช้บัญชีสมาชิกใหม่
            </p>

            <!-- Inline Email Signup Form -->
            <form onsubmit="handleLandingSignup(event)" class="w-full max-w-3xl flex flex-col md:flex-row gap-3 items-center justify-center px-4">
                <div class="w-full relative netflix-input rounded bg-black/40 border border-zinc-500 group focus-within:border-white transition-all duration-150">
                    <input type="email" id="landing-email" required placeholder=" " 
                           class="w-full px-4 pt-6 pb-2 bg-transparent text-white border-none rounded text-base focus:outline-none peer">
                    <label for="landing-email" class="absolute left-4 top-4 text-zinc-400 text-sm md:text-base pointer-events-none transition-all duration-150 transform -translate-y-3 scale-75 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">
                        ที่อยู่อีเมล
                    </label>
                </div>
                <button type="submit" class="w-full md:w-auto shrink-0 bg-[#E50914] hover:bg-[#C11119] flex items-center justify-center gap-2 text-white font-bold text-lg md:text-2xl px-8 py-4 rounded transition duration-200">
                    <span>เริ่มต้นใช้งาน</span>
                    <i class="fa-solid fa-chevron-right text-base"></i>
                </button>
            </form>
        </main>

        <!-- Feature Highlights Section 1 (Image Right) -->
        <section class="relative z-10 bg-black border-t-8 border-zinc-800 py-16 px-6 md:px-16">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-3xl md:text-5xl font-extrabold mb-4">รับชมบนทีวีของคุณ</h2>
                    <p class="text-lg md:text-xl text-zinc-300 font-light">
                        รับชมผ่านสมาร์ททีวี, Playstation, Xbox, Chromecast, Apple TV, เครื่องเล่น Blu-ray และอีกมากมาย
                    </p>
                </div>
                <div class="flex-1 relative flex justify-center">
                    <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/tv.png" alt="TV" class="z-10 relative">
                    <!-- Fake dynamic video mockup on TV -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none" style="top: -4%; width: 73%; left: 13%;">
                        <video class="w-full" autoplay playinline muted loop>
                            <source src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-tv-0819.m4v" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </section>

        <!-- Feature Highlights Section 2 (Image Left) -->
        <section class="relative z-10 bg-black border-t-8 border-zinc-800 py-16 px-6 md:px-16">
            <div class="max-w-6xl mx-auto flex flex-col-reverse md:flex-row items-center justify-between gap-10">
                <div class="flex-1 flex justify-center relative">
                    <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/mobile-0819.jpg" alt="Mobile" class="max-w-xs md:max-w-sm rounded">
                    <!-- Overlay Downloading Card Mockup -->
                    <div class="absolute bottom-6 bg-black border border-zinc-500 rounded-xl p-3 flex items-center gap-4 w-72 shadow-2xl">
                        <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/boxshot.png" alt="Stranger Things" class="h-16">
                        <div class="flex-grow">
                            <h4 class="font-bold text-sm">สเตรนเจอร์ ธิงส์</h4>
                            <span class="text-blue-500 text-xs">กำลังดาวน์โหลด...</span>
                        </div>
                        <i class="fa-solid fa-spinner animate-spin text-red-600"></i>
                    </div>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-3xl md:text-5xl font-extrabold mb-4">ดาวน์โหลดไว้ดูแบบออฟไลน์</h2>
                    <p class="text-lg md:text-xl text-zinc-300 font-light">
                        บันทึกวิดีโอเรื่องโปรดได้ง่ายๆ เพื่อรับชมได้ทุกที่ไม่มีขาดตอน
                    </p>
                </div>
            </div>
        </section>

        <!-- Feature Highlights Section 3 (Devices Showcase) -->
        <section class="relative z-10 bg-black border-t-8 border-zinc-800 py-16 px-6 md:px-16">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-3xl md:text-5xl font-extrabold mb-4">รับชมได้ทุกที่</h2>
                    <p class="text-lg md:text-xl text-zinc-300 font-light">
                        สตรีมภาพยนตร์และซีรีส์ได้ไม่จำกัดบนโทรศัพท์ แท็บเล็ต คอมพิวเตอร์แล็ปท็อป และทีวี
                    </p>
                </div>
                <div class="flex-1 relative flex justify-center">
                    <img src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/device-pile-th.png" alt="Devices" class="z-10 relative max-w-full">
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none" style="top: -15%; width: 63%; left: 18%;">
                        <video class="w-full" autoplay playinline muted loop>
                            <source src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-devices-th.m4v" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Accordion Section -->
        <section class="relative z-10 bg-black border-t-8 border-zinc-800 py-20 px-6 md:px-16">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-12">คำถามที่พบบ่อย</h2>
                
                <div class="flex flex-col gap-2 mb-12">
                    <!-- FAQ 1 -->
                    <div class="bg-zinc-800 hover:bg-zinc-700 transition duration-150">
                        <button onclick="toggleFaq(1)" class="w-full flex justify-between items-center p-6 text-left text-lg md:text-2xl font-semibold border-b border-black">
                            <span>Netflix คืออะไร?</span>
                            <i id="faq-icon-1" class="fa-solid fa-plus text-xl transition-transform duration-200"></i>
                        </button>
                        <div id="faq-ans-1" class="hidden p-6 text-lg text-zinc-300 leading-relaxed border-t border-black animate-fadeIn">
                            Netflix คือบริการสตรีมมิ่งที่นำเสนอความบันเทิงหลากหลายครบรส ทั้งซีรีส์ ภาพยนตร์ อนิเมะ สารคดี และอีกมากมายที่ชนะรางวัลบนอุปกรณ์ที่เชื่อมต่ออินเทอร์เน็ตนับพันรายการ รับชมได้มากตามต้องการ โดยไม่มีโฆษณาคั่นและไม่มีข้อผูกมัดรายเดือน
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-zinc-800 hover:bg-zinc-700 transition duration-150">
                        <button onclick="toggleFaq(2)" class="w-full flex justify-between items-center p-6 text-left text-lg md:text-2xl font-semibold border-b border-black">
                            <span>ค่าบริการ Netflix ราคาเท่าไหร่?</span>
                            <i id="faq-icon-2" class="fa-solid fa-plus text-xl transition-transform duration-200"></i>
                        </button>
                        <div id="faq-ans-2" class="hidden p-6 text-lg text-zinc-300 leading-relaxed border-t border-black animate-fadeIn">
                            รับชม Netflix บนสมาร์ทโฟน แท็บเล็ต สมาร์ททีวี แล็ปท็อป หรืออุปกรณ์สตรีมมิ่ง ด้วยค่าบริการรายเดือนเริ่มต้นที่ 99 บาท ถึง 419 บาทต่อเดือน ไม่มีค่าใช้จ่ายเพิ่มเติม ไม่มีสัญญาผูกมัด
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-zinc-800 hover:bg-zinc-700 transition duration-150">
                        <button onclick="toggleFaq(3)" class="w-full flex justify-between items-center p-6 text-left text-lg md:text-2xl font-semibold border-b border-black">
                            <span>รับชมได้ที่ไหนบ้าง?</span>
                            <i id="faq-icon-3" class="fa-solid fa-plus text-xl transition-transform duration-200"></i>
                        </button>
                        <div id="faq-ans-3" class="hidden p-6 text-lg text-zinc-300 leading-relaxed border-t border-black animate-fadeIn">
                            รับชมได้ทุกที่ ทุกเวลา ลงชื่อเข้าใช้บัญชี Netflix เพื่อรับชมทางเว็บไซด์ได้ทันทีจากคอมพิวเตอร์ส่วนตัว หรือผ่านแอปพลิเคชันที่ดาวน์โหลดได้ในสมาร์ทโฟน แท็บเล็ต เครื่องเล่นบลูเรย์ และสมาร์ททีวี
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="bg-zinc-800 hover:bg-zinc-700 transition duration-150">
                        <button onclick="toggleFaq(4)" class="w-full flex justify-between items-center p-6 text-left text-lg md:text-2xl font-semibold border-b border-black">
                            <span>ยกเลิกได้อย่างไร?</span>
                            <i id="faq-icon-4" class="fa-solid fa-plus text-xl transition-transform duration-200"></i>
                        </button>
                        <div id="faq-ans-4" class="hidden p-6 text-lg text-zinc-300 leading-relaxed border-t border-black animate-fadeIn">
                            ยกเลิกได้อย่างง่ายดายแบบไม่มีข้อผูกมัดหรือค่าธรรมเนียมการยกเลิก คุณสามารถเริ่มต้นหรือหยุดบัญชีได้ตลอดเวลาออนไลน์ด้วยคลิกเดียว
                        </div>
                    </div>
                </div>

                <!-- Footer Sign-up inside FAQ -->
                <div class="text-center">
                    <p class="text-md md:text-xl font-normal mb-4 text-zinc-200">
                        หากพร้อมแล้ว ป้อนที่อยู่อีเมลของคุณด้านล่างเพื่อร่วมสนุกกัน
                    </p>
                    <form onsubmit="handleLandingSignup(event)" class="w-full flex flex-col md:flex-row gap-3 items-center justify-center">
                        <div class="w-full relative netflix-input rounded bg-black/40 border border-zinc-500 group focus-within:border-white transition-all duration-150">
                            <input type="email" id="landing-email-2" required placeholder=" " 
                                   class="w-full px-4 pt-6 pb-2 bg-transparent text-white border-none rounded text-base focus:outline-none peer">
                            <label for="landing-email-2" class="absolute left-4 top-4 text-zinc-400 text-sm md:text-base pointer-events-none transition-all duration-150 transform -translate-y-3 scale-75 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">
                                ที่อยู่อีเมล
                            </label>
                        </div>
                        <button type="submit" class="w-full md:w-auto shrink-0 bg-[#E50914] hover:bg-[#C11119] flex items-center justify-center gap-2 text-white font-bold text-lg md:text-2xl px-8 py-4 rounded transition duration-200">
                            <span>เริ่มต้นใช้งาน</span>
                            <i class="fa-solid fa-chevron-right text-base"></i>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Landing Page Footer -->
        <footer class="bg-black text-zinc-400 border-t-8 border-zinc-800 py-16 px-6 md:px-16">
            <div class="max-w-6xl mx-auto">
                <p class="mb-8 hover:underline cursor-pointer">หากมีคำถาม โทร 1800-012-248 (โทรฟรี)</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-sm mb-12">
                    <ul class="flex flex-col gap-3">
                        <li class="hover:underline cursor-pointer">คำถามที่พบบ่อย</li>
                        <li class="hover:underline cursor-pointer">ลูกค้าสัมพันธ์</li>
                        <li class="hover:underline cursor-pointer">ซื้อบัตรของขวัญ</li>
                        <li class="hover:underline cursor-pointer">วิธีรับชม</li>
                    </ul>
                    <ul class="flex flex-col gap-3">
                        <li class="hover:underline cursor-pointer">ศูนย์ช่วยเหลือ</li>
                        <li class="hover:underline cursor-pointer">บัญชี</li>
                        <li class="hover:underline cursor-pointer">ศูนย์ข้อมูลสื่อ</li>
                        <li class="hover:underline cursor-pointer">ตำแหน่งงาน</li>
                    </ul>
                    <ul class="flex flex-col gap-3">
                        <li class="hover:underline cursor-pointer">เงื่อนไขการใช้งาน</li>
                        <li class="hover:underline cursor-pointer">ความเป็นส่วนตัว</li>
                        <li class="hover:underline cursor-pointer">คุ้กกี้พรีเฟอเรนซ์</li>
                        <li class="hover:underline cursor-pointer">ข้อมูลบริษัท</li>
                    </ul>
                    <ul class="flex flex-col gap-3">
                        <li class="hover:underline cursor-pointer">ติดต่อเรา</li>
                        <li class="hover:underline cursor-pointer">ทดสอบความเร็วอินเทอร์เน็ต</li>
                        <li class="hover:underline cursor-pointer">กฎหมายสำหรับการแจ้งเรื่อง</li>
                        <li class="hover:underline cursor-pointer">เฉพาะบน Netflix เท่านั้น</li>
                    </ul>
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <select class="bg-black/60 border border-zinc-700 text-zinc-300 rounded px-4 py-2 text-sm font-medium focus:outline-none focus:border-white">
                        <option value="th">ไทย</option>
                        <option value="en">English</option>
                    </select>
                </div>
                <p class="text-xs">Netflix ประเทศไทย</p>
            </div>
        </footer>
    </div>


    <!-- ============================================== -->
    <!-- SECTION 2: PROFILE SELECTION PAGE ("WHO'S WATCHING") -->
    <!-- ============================================== -->
    <div id="profile-page" class="hidden min-h-screen bg-[#141414] flex flex-col items-center justify-center animate-fadeIn relative z-40">
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-medium tracking-wide mb-10 md:mb-14">ใครกำลังรับชมอยู่?</h1>
            
            <!-- Profiles grid -->
            <div class="flex flex-wrap items-center justify-center gap-6 md:gap-10 mb-14 px-6">
                <!-- Profile 1 -->
                <div onclick="selectProfile('คุณลูกค้า')" class="group cursor-pointer flex flex-col items-center gap-3">
                    <div class="w-24 h-24 md:w-32 md:h-32 rounded bg-gradient-to-tr from-sky-500 to-indigo-600 flex items-center justify-center border-4 border-transparent group-hover:border-white transition-all duration-200 shadow-lg relative overflow-hidden">
                        <span class="text-4xl font-extrabold text-white">A</span>
                    </div>
                    <span class="text-zinc-400 group-hover:text-white transition duration-200 text-sm md:text-lg">คุณลูกค้า</span>
                </div>

                <!-- Profile 2 -->
                <div onclick="selectProfile('คนโปรด')" class="group cursor-pointer flex flex-col items-center gap-3">
                    <div class="w-24 h-24 md:w-32 md:h-32 rounded bg-gradient-to-tr from-rose-500 to-red-600 flex items-center justify-center border-4 border-transparent group-hover:border-white transition-all duration-200 shadow-lg relative overflow-hidden">
                        <span class="text-4xl font-extrabold text-white">B</span>
                    </div>
                    <span class="text-zinc-400 group-hover:text-white transition duration-200 text-sm md:text-lg">คนโปรด</span>
                </div>

                <!-- Profile 3 -->
                <div onclick="selectProfile('ครอบครัว')" class="group cursor-pointer flex flex-col items-center gap-3">
                    <div class="w-24 h-24 md:w-32 md:h-32 rounded bg-gradient-to-tr from-emerald-500 to-teal-600 flex items-center justify-center border-4 border-transparent group-hover:border-white transition-all duration-200 shadow-lg relative overflow-hidden">
                        <span class="text-4xl font-extrabold text-white">C</span>
                    </div>
                    <span class="text-zinc-400 group-hover:text-white transition duration-200 text-sm md:text-lg">ครอบครัว</span>
                </div>

                <!-- Profile 4 (Kids) -->
                <div onclick="selectProfile('โหมดเด็ก (Kids)')" class="group cursor-pointer flex flex-col items-center gap-3">
                    <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-gradient-to-tr from-amber-400 to-pink-500 flex items-center justify-center border-4 border-transparent group-hover:border-white transition-all duration-200 shadow-lg relative overflow-hidden">
                        <span class="text-2xl font-extrabold text-white">KIDS</span>
                    </div>
                    <span class="text-zinc-400 group-hover:text-white transition duration-200 text-sm md:text-lg">โหมดเด็ก</span>
                </div>
            </div>

            <!-- Manage Profiles button -->
            <button class="border border-zinc-500 hover:border-white hover:text-white text-zinc-500 px-6 py-2 text-sm md:text-base font-semibold tracking-wider uppercase transition duration-200">
                จัดการโปรไฟล์
            </button>
        </div>
    </div>


    <!-- ============================================== -->
    <!-- SECTION 3: NETFLIX BROWSE DASHBOARD (MAIN PLATFORM) -->
    <!-- ============================================== -->
    <div id="browse-page" class="hidden min-h-screen bg-[#141414] flex flex-col relative z-30 animate-fadeIn pb-24">
        
        <!-- Sticky Header / Nav bar -->
        <nav id="browse-nav" class="fixed top-0 left-0 right-0 z-50 transition-colors duration-500 bg-gradient-to-b from-black/80 to-transparent flex items-center justify-between px-6 md:px-16 py-4 h-16 md:h-20">
            <div class="flex items-center gap-10">
                <!-- Netflix Brand Logo -->
                <div onclick="navigateToDashboardHome()" class="cursor-pointer">
                    <svg class="h-5 md:h-7 fill-[#E50914]" viewBox="0 0 111 30" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 0h4.3v30H10.5zM22.2 0h4.2l8 17.5V0h4.2v30H34.4l-8.2-17.7V30h-4v-30zm20.8 0h12v4.1H47.2v7.6H54v4.1h-6.8v10.1h12V30H43V0zm19.6 0H74v4.1h-6.5v8.5H73v4.1h-5.5V30h-4.3V0zm15.4 0h4.2v25.9h7.4V30H78V0zm15.4 0h4.3v30h-4.3zM100.2 0h4.2l6.6 15-6.6 15h-4.2l6.5-15-6.5-15z"/>
                    </svg>
                </div>
                <!-- Menu Links (Desktop) -->
                <ul class="hidden lg:flex items-center gap-5 text-sm font-medium text-zinc-300">
                    <li onclick="navigateToDashboardHome()" class="text-white font-semibold cursor-pointer transition duration-150 hover:text-zinc-400">หน้าแรก</li>
                    <li onclick="filterCategoryNav('series')" class="cursor-pointer transition duration-150 hover:text-zinc-400">รายการทีวี</li>
                    <li onclick="filterCategoryNav('movies')" class="cursor-pointer transition duration-150 hover:text-zinc-400">ภาพยนตร์</li>
                    <li onclick="filterCategoryNav('new')" class="cursor-pointer transition duration-150 hover:text-zinc-400">มาใหม่และกำลังฮิต</li>
                    <li onclick="showMyListOnly()" class="cursor-pointer transition duration-150 hover:text-zinc-400 flex items-center gap-1.5">
                        <span>รายการของฉัน</span>
                        <span id="mylist-badge" class="bg-[#E50914] text-white text-[10px] px-1.5 rounded-full hidden">0</span>
                    </li>
                </ul>
            </div>

            <!-- Search, Notification & Profile Icon Menu -->
            <div class="flex items-center gap-6 text-white text-lg font-light">
                <!-- Animated Search Input -->
                <div class="relative flex items-center border border-transparent focus-within:border-zinc-500 bg-black/40 rounded px-2.5 py-1.5 transition-all duration-300">
                    <button onclick="focusSearchInput()" class="focus:outline-none"><i class="fa-solid fa-magnifying-glass text-zinc-300 text-sm md:text-base"></i></button>
                    <input type="text" id="search-bar" oninput="handleSearch(this.value)" placeholder="ค้นหาชื่อเรื่อง..." 
                           class="w-0 focus:w-40 md:focus:w-56 transition-all duration-300 bg-transparent text-sm text-white focus:outline-none ml-2 border-none">
                </div>

                <!-- Notifications Dropdown Trigger -->
                <div class="relative group cursor-pointer">
                    <i class="fa-regular fa-bell text-sm md:text-base"></i>
                    <span class="absolute -top-1.5 -right-1.5 w-2 h-2 bg-[#E50914] rounded-full"></span>
                    <div class="absolute right-0 top-full mt-2 w-72 bg-black/95 border border-zinc-800 rounded-md p-4 shadow-2xl hidden group-hover:block text-xs z-50">
                        <div class="font-bold border-b border-zinc-800 pb-2 mb-2 text-zinc-200">การแจ้งเตือนล่าสุด</div>
                        <div class="flex gap-3 items-start py-2 hover:bg-zinc-900 px-1 rounded">
                            <div class="w-2 h-2 rounded-full bg-blue-500 mt-1.5"></div>
                            <div>
                                <p class="font-semibold text-white">รับชมได้แล้ววันนี้</p>
                                <p class="text-zinc-400">สควิดเกม เล่นลุ้นตาย ซีซั่นใหม่ล่าสุด พร้อมสตรีมแล้ว!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Custom Profile icon with dropdown menu -->
                <div class="relative group flex items-center gap-2 cursor-pointer">
                    <div id="nav-active-avatar" class="w-8 h-8 rounded bg-gradient-to-tr from-sky-500 to-indigo-600 flex items-center justify-center font-bold text-sm text-white border border-zinc-700 shadow-md">
                        A
                    </div>
                    <i class="fa-solid fa-caret-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                    
                    <!-- Dropdown box -->
                    <div class="absolute right-0 top-full mt-2 w-56 bg-black/95 border border-zinc-800 rounded-md p-2 shadow-2xl hidden group-hover:flex flex-col text-xs z-50">
                        <div class="p-2 flex items-center gap-3 hover:bg-zinc-950 rounded cursor-pointer border-b border-zinc-800 mb-2">
                            <div id="dropdown-avatar" class="w-6 h-6 rounded bg-gradient-to-tr from-sky-500 to-indigo-600 flex items-center justify-center font-bold text-[10px] text-white">A</div>
                            <span id="dropdown-profile-name" class="font-bold text-white">คุณลูกค้า</span>
                        </div>
                        <div onclick="transitionToProfileSelection()" class="p-2 hover:bg-zinc-900 rounded cursor-pointer text-zinc-300 flex items-center gap-2">
                            <i class="fa-solid fa-users text-zinc-400"></i>
                            <span>สลับโปรไฟล์</span>
                        </div>
                        <div onclick="logOutAndReset()" class="p-2 hover:bg-zinc-900 rounded cursor-pointer text-[#E50914] border-t border-zinc-800 mt-2 flex items-center gap-2 font-medium">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>ออกจากระบบ</span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Spotlight Banner -->
        <section class="relative h-[65vh] md:h-[85vh] w-full flex items-center z-10 select-none">
            <!-- Backdrop layer with custom linear gradients to mask edges nicely -->
            <div id="hero-backdrop" class="absolute inset-0 bg-cover bg-center transition-all duration-700 bg-no-repeat z-0" style="background-image: linear-gradient(to right, rgba(20,20,20,1) 0%, rgba(20,20,20,0.6) 30%, rgba(20,20,20,0) 70%, rgba(20,20,20,1) 100%), linear-gradient(to top, rgba(20,20,20,1) 0%, rgba(20,20,20,0.4) 40%, rgba(20,20,20,0.7) 100%);"></div>

            <!-- Spotlight Content -->
            <div class="relative z-10 max-w-4xl px-6 md:px-16 flex flex-col items-start gap-4 md:gap-6">
                <!-- Netflix Originals Tag -->
                <div class="flex items-center gap-2">
                    <span class="text-[#E50914] font-extrabold text-2xl tracking-wider uppercase">N</span>
                    <span class="text-zinc-300 text-xs tracking-[4px] uppercase font-bold">Original Series</span>
                </div>
                <!-- Title -->
                <h1 id="hero-title" class="text-3xl md:text-6xl font-extrabold drop-shadow-2xl max-w-2xl leading-tight">
                    สควิดเกม เล่นลุ้นตาย
                </h1>
                <!-- Badges Row -->
                <div class="flex items-center gap-3 text-sm flex-wrap">
                    <span id="hero-match" class="text-green-500 font-semibold">98% Match</span>
                    <span id="hero-year" class="text-zinc-400">2024</span>
                    <span id="hero-age" class="bg-zinc-800 px-1.5 py-0.5 rounded text-xs border border-zinc-700">18+</span>
                    <span id="hero-seasons" class="text-zinc-300">ซีซั่น 2</span>
                    <span id="hero-quality" class="border border-zinc-600 text-zinc-300 text-[10px] px-1 rounded">Ultra HD 4K</span>
                </div>
                <!-- Description -->
                <p id="hero-desc" class="text-zinc-300 text-sm md:text-lg max-w-xl leading-relaxed drop-shadow-md line-clamp-3">
                    ผู้เข้าแข่งขันหลายร้อยคนที่มีปัญหาทางการเงินตอบรับคำเชิญปริศนาเพื่อเข้าร่วมเล่นเกมของเด็กที่แสนธรรมดา แต่มีเดิมพันสูงลิ่วและอันตรายถึงชีวิต เพื่อชิงเงินรางวัลมหาศาล
                </p>
                <!-- Controls buttons -->
                <div class="flex items-center gap-4 mt-2 w-full md:w-auto">
                    <button onclick="handlePlayHero()" class="flex-grow md:flex-grow-0 bg-white hover:bg-zinc-200 text-black px-6 md:px-8 py-3 rounded-md font-semibold text-sm md:text-base flex items-center justify-center gap-3 transition-colors duration-200">
                        <i class="fa-solid fa-play text-lg"></i>
                        <span>เล่น</span>
                    </button>
                    <button id="hero-info-btn" onclick="openHeroDetailsModal()" class="flex-grow md:flex-grow-0 bg-zinc-500/40 hover:bg-zinc-500/60 text-white px-6 md:px-8 py-3 rounded-md font-semibold text-sm md:text-base flex items-center justify-center gap-3 transition-colors duration-200 backdrop-blur-md">
                        <i class="fa-solid fa-circle-info text-lg"></i>
                        <span>ข้อมูลเพิ่มเติม</span>
                    </button>
                    <!-- Audio sound mockup toggle on top -->
                    <button onclick="toggleAudioMockup()" class="border border-zinc-500 hover:bg-zinc-800/40 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-200">
                        <i id="audio-icon" class="fa-solid fa-volume-xmark text-sm"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Movie Lists Categories -->
        <main class="relative z-20 px-6 md:px-16 -mt-16 md:-mt-24 flex flex-col gap-10">
            <!-- Dynamic Grid or Row Carousels will be populated here -->
            <div id="search-results-section" class="hidden">
                <h2 class="text-xl md:text-2xl font-semibold mb-6 text-zinc-400">ผลการค้นหาสำหรับ: <span id="search-query-text" class="text-white"></span></h2>
                <div id="search-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <!-- Dynamic Search cards -->
                </div>
            </div>

            <!-- Standard Rows (If Search is inactive) -->
            <div id="standard-rows" class="flex flex-col gap-12">
                
                <!-- Category 1: Trending Now -->
                <div class="relative group/row">
                    <h2 class="text-lg md:text-2xl font-bold mb-4 tracking-wide flex items-center gap-2">
                        <span>รายการกำลังฮิตตอนนี้ (Trending Now)</span>
                        <span class="text-xs text-[#E50914] hidden md:inline group-hover/row:opacity-100 transition-opacity duration-300 opacity-0 cursor-pointer">ดูทั้งหมด <i class="fa-solid fa-chevron-right text-[10px]"></i></span>
                    </h2>
                    <!-- Slider Container -->
                    <div class="relative">
                        <button onclick="scrollRow('carousel-trending', 'left')" class="absolute left-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-r shadow-2xl">
                            <i class="fa-solid fa-chevron-left text-xl"></i>
                        </button>
                        <div id="carousel-trending" class="flex gap-4 overflow-x-auto no-scrollbar scroll-smooth py-4">
                            <!-- Populated Dynamically with JS -->
                        </div>
                        <button onclick="scrollRow('carousel-trending', 'right')" class="absolute right-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-l shadow-2xl">
                            <i class="fa-solid fa-chevron-right text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Category 2: Action Thrillers -->
                <div class="relative group/row">
                    <h2 class="text-lg md:text-2xl font-bold mb-4 tracking-wide flex items-center gap-2">
                        <span>ภาพยนตร์และซีรีส์แอ็คชั่นสุดระทึกใจ</span>
                        <span class="text-xs text-[#E50914] hidden md:inline group-hover/row:opacity-100 transition-opacity duration-300 opacity-0 cursor-pointer">ดูทั้งหมด <i class="fa-solid fa-chevron-right text-[10px]"></i></span>
                    </h2>
                    <div class="relative">
                        <button onclick="scrollRow('carousel-action', 'left')" class="absolute left-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-r shadow-2xl">
                            <i class="fa-solid fa-chevron-left text-xl"></i>
                        </button>
                        <div id="carousel-action" class="flex gap-4 overflow-x-auto no-scrollbar scroll-smooth py-4">
                            <!-- Populated Dynamically with JS -->
                        </div>
                        <button onclick="scrollRow('carousel-action', 'right')" class="absolute right-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-l shadow-2xl">
                            <i class="fa-solid fa-chevron-right text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Category 3: Sci-Fi & Adventure -->
                <div class="relative group/row">
                    <h2 class="text-lg md:text-2xl font-bold mb-4 tracking-wide flex items-center gap-2">
                        <span>ไซไฟ และ อนาคตสุดล้ำลึก</span>
                        <span class="text-xs text-[#E50914] hidden md:inline group-hover/row:opacity-100 transition-opacity duration-300 opacity-0 cursor-pointer">ดูทั้งหมด <i class="fa-solid fa-chevron-right text-[10px]"></i></span>
                    </h2>
                    <div class="relative">
                        <button onclick="scrollRow('carousel-scifi', 'left')" class="absolute left-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-r shadow-2xl">
                            <i class="fa-solid fa-chevron-left text-xl"></i>
                        </button>
                        <div id="carousel-scifi" class="flex gap-4 overflow-x-auto no-scrollbar scroll-smooth py-4">
                            <!-- Populated Dynamically with JS -->
                        </div>
                        <button onclick="scrollRow('carousel-scifi', 'right')" class="absolute right-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-l shadow-2xl">
                            <i class="fa-solid fa-chevron-right text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Category 4: My List (Dynamic) -->
                <div id="my-list-row" class="relative group/row hidden">
                    <h2 class="text-lg md:text-2xl font-bold mb-4 tracking-wide text-red-500">
                        รายการของฉัน (My List)
                    </h2>
                    <div class="relative">
                        <button onclick="scrollRow('carousel-mylist', 'left')" class="absolute left-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-r shadow-2xl">
                            <i class="fa-solid fa-chevron-left text-xl"></i>
                        </button>
                        <div id="carousel-mylist" class="flex gap-4 overflow-x-auto no-scrollbar scroll-smooth py-4">
                            <!-- Empty initially or populated via JS -->
                        </div>
                        <button onclick="scrollRow('carousel-mylist', 'right')" class="absolute right-[-20px] top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white w-10 h-16 z-30 flex items-center justify-center opacity-0 group-hover/row:opacity-100 transition-opacity duration-300 rounded-l shadow-2xl">
                            <i class="fa-solid fa-chevron-right text-xl"></i>
                        </button>
                    </div>
                </div>

            </div>
        </main>
    </div>


    <!-- ============================================== -->
    <!-- COMPONENT: INTERACTIVE DETAIL MODAL -->
    <!-- ============================================== -->
    <div id="movie-modal" class="hidden fixed inset-0 bg-black/80 z-50 backdrop-blur-md overflow-y-auto py-10 px-4 flex justify-center items-start animate-fadeIn">
        <!-- Close overlay click -->
        <div onclick="closeMovieModal()" class="absolute inset-0 z-0 cursor-default"></div>

        <!-- Modal Body Container -->
        <div class="relative w-full max-w-3xl bg-zinc-900 rounded-xl overflow-hidden shadow-2xl z-10 animate-scaleUp">
            <!-- Modal Header Banner -->
            <div class="relative h-64 md:h-96 w-full bg-cover bg-center" id="modal-backdrop">
                <!-- Inner Shadows -->
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-transparent to-transparent"></div>
                <!-- Close Button -->
                <button onclick="closeMovieModal()" class="absolute top-4 right-4 bg-zinc-950/80 hover:bg-zinc-850/100 text-white w-8 h-8 rounded-full flex items-center justify-center shadow-md transition duration-150 z-20">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
                
                <!-- Bottom controls on banner -->
                <div class="absolute bottom-6 left-6 md:left-10 z-10">
                    <h2 id="modal-title" class="text-2xl md:text-4xl font-extrabold text-white mb-4 drop-shadow-lg">ชื่อเรื่องภาพยนตร์</h2>
                    <div class="flex items-center gap-3">
                        <button onclick="handlePlayActionFromModal()" class="bg-[#E50914] hover:bg-[#C11119] text-white font-bold px-6 py-2.5 rounded text-sm md:text-base flex items-center gap-2 transition duration-200">
                            <i class="fa-solid fa-play"></i>
                            <span>เล่นเลย</span>
                        </button>
                        <button id="modal-list-toggle-btn" onclick="toggleMyListFromModal()" class="border border-zinc-400 hover:border-white bg-zinc-950/40 hover:bg-zinc-800/40 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-200">
                            <i class="fa-solid fa-plus text-base"></i>
                        </button>
                        <button onclick="likeMovieMock()" class="border border-zinc-400 hover:border-white bg-zinc-950/40 hover:bg-zinc-800/40 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-200">
                            <i class="fa-regular fa-thumbs-up text-base"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Content Section -->
            <div class="p-6 md:p-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm md:text-base">
                <!-- Left Details Area (2 cols) -->
                <div class="md:col-span-2 flex flex-col gap-4">
                    <div class="flex items-center gap-3 flex-wrap">
                        <span id="modal-match" class="text-green-500 font-bold">98% Match</span>
                        <span id="modal-year" class="text-zinc-400">2024</span>
                        <span id="modal-age" class="bg-zinc-800 px-1.5 py-0.5 rounded text-xs border border-zinc-700">18+</span>
                        <span id="modal-duration" class="text-zinc-300">ซีซั่น 1</span>
                        <span id="modal-quality" class="border border-zinc-700 text-zinc-400 text-xs px-1 rounded font-medium">Ultra HD 4K</span>
                    </div>
                    <p id="modal-description" class="text-zinc-200 leading-relaxed font-light">
                        เรื่องย่อแบบยาวที่มีรายละเอียดเข้มข้นที่จะช่วยอธิบายให้เข้าใจว่าเนื้อเรื่องนี้เกี่ยวกับอะไรและน่าติดตามขนาดไหน
                    </p>
                </div>

                <!-- Right Metadata Area (1 col) -->
                <div class="flex flex-col gap-3 text-zinc-400">
                    <div>
                        <span class="text-zinc-500">ประเภท:</span> 
                        <span id="modal-genres" class="text-zinc-300 hover:underline cursor-pointer">ระทึกขวัญ, การเอาชีวิตรอด</span>
                    </div>
                    <div>
                        <span class="text-zinc-500">ซีรีส์เรื่องนี้มีลักษณะ:</span> 
                        <span class="text-zinc-300">ตื่นเต้นเร้าใจ, น่าติดตาม</span>
                    </div>
                    <div class="mt-4 p-4 border border-zinc-800 bg-zinc-950/50 rounded-lg text-xs flex items-center justify-between">
                        <div>
                            <span class="font-bold text-white block mb-0.5">สตรีมเลยโดยไม่มีข้อผูกมัด</span>
                            <span class="text-zinc-500">ยกเลิกหรือสมัครรับบริการแพ็กเกจที่เหมาะกับคุณ</span>
                        </div>
                        <button onclick="handlePlayActionFromModal()" class="text-[#E50914] hover:text-white font-bold whitespace-nowrap">ดูเลย ></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================== -->
    <!-- JAVASCRIPT: LOGIC & DYNAMIC COMPONENT LOADS -->
    <!-- ============================================== -->
    <script>
        // App Navigation and Router States
        let currentProfile = null;
        let myFavoritesList = []; // Stores IDs of movies added to my list
        let audioMuted = true;

        // Transitions from Landing to Profile selection Screen
        function transitionToProfileSelection() {
            // Read potentially saved email
            const emailInp = document.getElementById('landing-email').value || document.getElementById('landing-email-2').value;
            if (emailInp) {
                showToast(`ยินดีต้อนรับสมาชิกใหม่! (${emailInp})`, true);
            }

            document.getElementById('landing-page').classList.add('hidden');
            document.getElementById('browse-page').classList.add('hidden');
            
            // Show Profile Selection
            const profilePage = document.getElementById('profile-page');
            profilePage.classList.remove('hidden');
            profilePage.scrollIntoView({ behavior: 'smooth' });
        }

        // Action when profile is clicked
        function selectProfile(profileName) {
            currentProfile = profileName;
            showToast(`กำลังลงชื่อเข้าใช้ระบบในโปรไฟล์: ${profileName}`);
            
            // Set navbar avatar look
            const firstChar = profileName.charAt(0).toUpperCase();
            document.getElementById('nav-active-avatar').innerText = firstChar;
            document.getElementById('dropdown-avatar').innerText = firstChar;
            document.getElementById('dropdown-profile-name').innerText = profileName;

            // Update avatar colors based on selected profile to match exactly
            const avatarInNav = document.getElementById('nav-active-avatar');
            const avatarInDropdown = document.getElementById('dropdown-avatar');
            
            let colorClasses = "from-sky-500 to-indigo-600";
            if (profileName === 'คนโปรด') colorClasses = "from-rose-500 to-red-600";
            if (profileName === 'ครอบครัว') colorClasses = "from-emerald-500 to-teal-600";
            if (profileName === 'โหมดเด็ก (Kids)') colorClasses = "from-amber-400 to-pink-500 rounded-full";

            avatarInNav.className = `w-8 h-8 rounded bg-gradient-to-tr ${colorClasses} flex items-center justify-center font-bold text-sm text-white border border-zinc-700 shadow-md`;
            avatarInDropdown.className = `w-6 h-6 rounded bg-gradient-to-tr ${colorClasses} flex items-center justify-center font-bold text-[10px] text-white`;

            // Transition to actual Movie dashboard platform
            setTimeout(() => {
                document.getElementById('profile-page').classList.add('hidden');
                document.getElementById('browse-page').classList.remove('hidden');
                initializeMovieDashboard();
            }, 600);
        }

        // Fallback or Logging out action
        function logOutAndReset() {
            currentProfile = null;
            document.getElementById('browse-page').classList.add('hidden');
            document.getElementById('profile-page').classList.add('hidden');
            document.getElementById('landing-page').classList.remove('hidden');
            showToast("ออกจากระบบสำเร็จ");
        }

        function handleLandingSignup(event) {
            event.preventDefault();
            transitionToProfileSelection();
        }
    </script>

    <script>
        // Init Movie rows dynamically on dashboard landing
        function initializeMovieDashboard() {
            // Render rows
            renderMovieRow('carousel-trending', MOVIE_DATABASE.filter(m => m.category === 'trending'));
            renderMovieRow('carousel-action', MOVIE_DATABASE.filter(m => m.category === 'action'));
            renderMovieRow('carousel-scifi', MOVIE_DATABASE.filter(m => m.category === 'scifi'));

            // Sync My List UI Badge
            updateMyListBadge();
            
            // Setup Window Scroll Listeners for Nav background
            window.addEventListener('scroll', handleNavbarScroll);
        }

        // Render Cards inside specific element row
        function renderMovieRow(elementId, moviesList) {
            const container = document.getElementById(elementId);
            container.innerHTML = '';

            if (moviesList.length === 0) {
                container.innerHTML = `
                    <div class="text-zinc-500 text-sm py-8 px-4 font-normal">
                        ยังไม่มีรายการเพิ่มไว้ในนี้ทีค่ะ...
                    </div>
                `;
                return;
            }

            moviesList.forEach(movie => {
                const card = document.createElement('div');
                card.className = "flex-shrink-0 w-40 sm:w-56 bg-zinc-800 rounded-md overflow-hidden shadow-md cursor-pointer relative group transition-all duration-300 hover:scale-105 hover:z-40";
                
                const isFavorite = myFavoritesList.includes(movie.id);
                const plusIconClass = isFavorite ? 'fa-solid fa-check text-green-500' : 'fa-solid fa-plus';

                card.innerHTML = `
                    <!-- Thumbnail Poster Image -->
                    <div onclick="openMovieDetailsModal('${movie.id}')" class="relative aspect-video bg-zinc-900 bg-cover bg-center h-24 sm:h-32" style="background-image: url('${movie.image || movie.backdrop}');">
                        <!-- Play Hover overlay button -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                            <i class="fa-solid fa-circle-play text-white text-3xl"></i>
                        </div>
                    </div>
                    <!-- Movie Fast Details Box below/hover expandable -->
                    <div class="p-3 bg-zinc-900 text-white flex flex-col gap-1">
                        <div class="flex items-center justify-between">
                            <h4 onclick="openMovieDetailsModal('${movie.id}')" class="font-bold text-xs sm:text-sm truncate w-32 sm:w-40 hover:underline">${movie.title}</h4>
                            <button onclick="event.stopPropagation(); toggleMyList('${movie.id}')" class="text-zinc-400 hover:text-white text-xs sm:text-sm">
                                <i id="btn-icon-${movie.id}" class="${plusIconClass}"></i>
                            </button>
                        </div>
                        <div class="flex items-center gap-2 text-[10px] text-zinc-400">
                            <span class="text-green-500 font-bold">${movie.rating}</span>
                            <span>${movie.year}</span>
                            <span class="bg-zinc-800 border border-zinc-700 px-1 rounded text-[9px] text-zinc-300 font-medium">${movie.age}</span>
                        </div>
                        <div class="text-[9px] text-zinc-400 truncate mt-1">
                            ${movie.genres.join(' • ')}
                        </div>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Horizontal scrolling behavior for specific Row container
        function scrollRow(carouselId, direction) {
            const carousel = document.getElementById(carouselId);
            const scrollOffset = carousel.clientWidth * 0.75;
            if (direction === 'left') {
                carousel.scrollLeft -= scrollOffset;
            } else {
                carousel.scrollLeft += scrollOffset;
            }
        }

        // Sticky dynamic navbar on scroll
        function handleNavbarScroll() {
            const nav = document.getElementById('browse-nav');
            if (window.scrollY > 40) {
                nav.classList.add('bg-[#141414]');
                nav.classList.remove('bg-gradient-to-b', 'from-black/80', 'to-transparent');
            } else {
                nav.classList.remove('bg-[#141414]');
                nav.classList.add('bg-gradient-to-b', 'from-black/80', 'to-transparent');
            }
        }
    </script>

    <script>
        // My List Handler: toggling saved status
        function toggleMyList(movieId) {
            const index = myFavoritesList.indexOf(movieId);
            const movie = MOVIE_DATABASE.find(m => m.id === movieId);

            if (index > -1) {
                myFavoritesList.splice(index, 1);
                showToast(`ลบ "${movie.title}" ออกจากรายการของฉันแล้ว`);
            } else {
                myFavoritesList.push(movieId);
                showToast(`เพิ่ม "${movie.title}" ไปที่รายการของฉันแล้ว`, true);
            }

            // Sync badge UI count
            updateMyListBadge();

            // Refresh all visible lists
            refreshListsAndCarousels();
        }

        function updateMyListBadge() {
            const badge = document.getElementById('mylist-badge');
            if (myFavoritesList.length > 0) {
                badge.innerText = myFavoritesList.length;
                badge.classList.remove('hidden');
                
                // Show list row immediately as active
                document.getElementById('my-list-row').classList.remove('hidden');
            } else {
                badge.classList.add('hidden');
                document.getElementById('my-list-row').classList.add('hidden');
            }
        }

        function refreshListsAndCarousels() {
            // Render again
            renderMovieRow('carousel-trending', MOVIE_DATABASE.filter(m => m.category === 'trending'));
            renderMovieRow('carousel-action', MOVIE_DATABASE.filter(m => m.category === 'action'));
            renderMovieRow('carousel-scifi', MOVIE_DATABASE.filter(m => m.category === 'scifi'));

            // Populate My List Row specifically
            const favoriteMovies = MOVIE_DATABASE.filter(m => myFavoritesList.includes(m.id));
            renderMovieRow('carousel-mylist', favoriteMovies);
        }

        // Show My List Only navigation click
        function showMyListOnly() {
            // Scroll user right to my-list-row element
            const myListElem = document.getElementById('my-list-row');
            if (myFavoritesList.length > 0) {
                myListElem.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                showToast("คุณยังไม่มีรายการในรายการของฉันค่ะ ค้นหารายการเพิ่มเติมและคลิกปุ่ม '+' เพื่อเพิ่มสิคะ!", false);
            }
        }

        // Category Filter Navigation click
        function filterCategoryNav(type) {
            let filtered = [];
            let rowName = "รายการฟิลเตอร์";
            
            if (type === 'series') {
                filtered = MOVIE_DATABASE.filter(m => m.seasons !== undefined);
                rowName = "รายการทีวีซีรีส์ทั้งหมด";
            } else if (type === 'movies') {
                filtered = MOVIE_DATABASE.filter(m => m.seasons === undefined || m.seasons.includes('ภาค') || m.seasons.includes('ชั่วโมง'));
                rowName = "ภาพยนตร์ยอดนิยมทั้งหมด";
            } else {
                filtered = MOVIE_DATABASE;
                rowName = "มาใหม่และกำลังได้รับความสนใจสูง";
            }

            // Simulate loading
            showToast(`กำลังโหลดหมวดหมู่: ${rowName}...`);
            setTimeout(() => {
                // Focus screen view down to categories
                document.getElementById('standard-rows').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);
        }

        function navigateToDashboardHome() {
            // Scroll top, clear search
            window.scrollTo({ top: 0, behavior: 'smooth' });
            document.getElementById('search-bar').value = '';
            document.getElementById('search-results-section').classList.add('hidden');
            document.getElementById('standard-rows').classList.remove('hidden');
        }
    </script>

    <script>
        let currentlyActiveModalMovieId = null;

        // Opens details view modal for a specific movie card
        function openMovieDetailsModal(movieId) {
            const movie = MOVIE_DATABASE.find(m => m.id === movieId);
            if (!movie) return;

            currentlyActiveModalMovieId = movieId;

            // Set content values
            document.getElementById('modal-backdrop').style.backgroundImage = `linear-gradient(to top, rgba(24,24,27,1) 0%, rgba(24,24,27,0.3) 50%, rgba(24,24,27,0.8) 100%), url('${movie.backdrop}')`;
            document.getElementById('modal-title').innerText = movie.title;
            document.getElementById('modal-match').innerText = movie.rating;
            document.getElementById('modal-year').innerText = movie.year;
            document.getElementById('modal-age').innerText = movie.age;
            document.getElementById('modal-duration').innerText = movie.seasons || "2 ชม. 15 นาที";
            document.getElementById('modal-description').innerText = movie.description;
            document.getElementById('modal-genres').innerText = movie.genres.join(', ');

            // Set state on dynamic toggle list icon in modal
            const isFavorite = myFavoritesList.includes(movieId);
            const listToggleBtn = document.getElementById('modal-list-toggle-btn');
            listToggleBtn.innerHTML = isFavorite ? '<i class="fa-solid fa-check text-green-500"></i>' : '<i class="fa-solid fa-plus text-base"></i>';

            // Unhide Modal Container
            const modal = document.getElementById('movie-modal');
            modal.classList.remove('hidden');
            // Disable page scrolling while modal is active
            document.body.style.overflow = 'hidden';
        }

        function openHeroDetailsModal() {
            // In mock, the hero spotlight is SQUID GAME (id: m1)
            openMovieDetailsModal('m1');
        }

        // Toggles list addition directly inside opened modal
        function toggleMyListFromModal() {
            if (!currentlyActiveModalMovieId) return;
            toggleMyList(currentlyActiveModalMovieId);
            
            // Sync status on icon inside modal immediately
            const isFavorite = myFavoritesList.includes(currentlyActiveModalMovieId);
            const listToggleBtn = document.getElementById('modal-list-toggle-btn');
            listToggleBtn.innerHTML = isFavorite ? '<i class="fa-solid fa-check text-green-500"></i>' : '<i class="fa-solid fa-plus text-base"></i>';
        }

        // Mock Play button action triggers
        function handlePlayActionFromModal() {
            const movie = MOVIE_DATABASE.find(m => m.id === currentlyActiveModalMovieId);
            showToast(`กำลังโหลดหน้าเล่นภาพยนตร์สำหรับ: "${movie.title}" ในรูปแบบ Full-HD...`, true);
            closeMovieModal();
        }

        function handlePlayHero() {
            showToast(`กำลังเริ่มเล่นเรื่อง สควิดเกม ซีซั่น 2 ทันที...`, true);
        }

        function closeMovieModal() {
            document.getElementById('movie-modal').classList.add('hidden');
            currentlyActiveModalMovieId = null;
            // Restore standard scrollbar settings
            document.body.style.overflow = 'auto';
        }

        function likeMovieMock() {
            showToast("เพิ่มเรื่องนี้ไว้ในอันดับความชอบสูงสุดของคุณแล้ว!", true);
        }
    </script>

    <script>
        function focusSearchInput() {
            const searchBar = document.getElementById('search-bar');
            searchBar.focus();
        }

        // Interactive search trigger
        function handleSearch(query) {
            const resultsSection = document.getElementById('search-results-section');
            const standardRows = document.getElementById('standard-rows');
            const queryTextElem = document.getElementById('search-query-text');
            const gridContainer = document.getElementById('search-grid');

            if (!query || query.trim() === '') {
                resultsSection.classList.add('hidden');
                standardRows.classList.remove('hidden');
                return;
            }

            // Filters matching titles or genres
            const matches = MOVIE_DATABASE.filter(m => 
                m.title.toLowerCase().includes(query.toLowerCase()) || 
                m.genres.some(g => g.toLowerCase().includes(query.toLowerCase()))
            );

            // Toggle views
            standardRows.classList.add('hidden');
            resultsSection.classList.remove('hidden');
            queryTextElem.innerText = `"${query}"`;

            // Populate Search Grid
            gridContainer.innerHTML = '';
            if (matches.length === 0) {
                gridContainer.innerHTML = `
                    <div class="col-span-full py-12 text-center text-zinc-500 text-base">
                        ไม่พบข้อมูลภาพยนตร์หรือรายการซีรีส์ที่ตรงกับที่คุณค้นหาค่ะ ทดลองใหม่อีกครั้ง
                    </div>
                `;
                return;
            }

            matches.forEach(movie => {
                const card = document.createElement('div');
                card.className = "bg-zinc-800 rounded-md overflow-hidden shadow-md cursor-pointer group transition-all duration-300 hover:scale-105";
                
                card.innerHTML = `
                    <div onclick="openMovieDetailsModal('${movie.id}')" class="relative aspect-video bg-cover bg-center h-28" style="background-image: url('${movie.backdrop}');">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                            <i class="fa-solid fa-circle-play text-white text-3xl"></i>
                        </div>
                    </div>
                    <div class="p-3 bg-zinc-900 text-white">
                        <h4 onclick="openMovieDetailsModal('${movie.id}')" class="font-bold text-xs truncate hover:underline">${movie.title}</h4>
                        <div class="flex items-center gap-2 text-[10px] text-zinc-400 mt-1">
                            <span class="text-green-500 font-bold">${movie.rating}</span>
                            <span>${movie.year}</span>
                        </div>
                    </div>
                `;
                gridContainer.appendChild(card);
            });
        }

        // Mock sound trigger on hero
        function toggleAudioMockup() {
            const icon = document.getElementById('audio-icon');
            audioMuted = !audioMuted;
            if (audioMuted) {
                icon.className = 'fa-solid fa-volume-xmark text-sm';
                showToast("ปิดเสียงพรีวิวแล้ว");
            } else {
                icon.className = 'fa-solid fa-volume-high text-sm';
                showToast("เปิดเสียงพรีวิวสตรีม (จำลอง)", true);
            }
        }
    </script>

    <script>
        // Smooth FAQ accordion toggle
        function toggleFaq(faqId) {
            const answer = document.getElementById(`faq-ans-${faqId}`);
            const icon = document.getElementById(`faq-icon-${faqId}`);

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.className = "fa-solid fa-xmark text-xl transition-transform duration-200 rotate-90";
            } else {
                answer.classList.add('hidden');
                icon.className = "fa-solid fa-plus text-xl transition-transform duration-200";
            }
        }
    </script>

</body>
</html>kuyraiaima taohu