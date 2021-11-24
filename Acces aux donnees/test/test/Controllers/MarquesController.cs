using AutoMapper;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test.Data.Dtos;
using test.Data.Models;
using test.Data.Services;

namespace test.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class MarquesController:ControllerBase
    {
        private readonly MarquesServices _service;
        private readonly IMapper _mapper;

        public MarquesController(MarquesServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        [HttpGet]
        public ActionResult<IEnumerable<MarquesDto>> GetAllMarques()
        {
            IEnumerable<Marque> listeDeMarques = _service.GetAllMarques();
            return Ok(_mapper.Map<IEnumerable<MarquesDto>>(listeDeMarques));
        }

        [HttpGet("{id}", Name = "GetMarqueById")]
        public ActionResult<MarquesDto>GetMarqueById(int id)
        {
            Marque commandItem = _service.GetMarqueById(id);
            if(commandItem != null)
            {
                return Ok(_mapper.Map<MarquesDto>(commandItem));
            }
            return NotFound();
        }

        [HttpPost]
        public ActionResult<MarquesDto> CreateMarque(Marque marque)
        {
            _service.AddMarques(marque);
            return CreatedAtRoute(nameof(GetMarqueById), new { Id = marque.MarId }, marque);
        }

        [HttpPut("{id}")]
        public ActionResult UpdateMarque(int id, MarquesDto marque)
        {
            Marque marqueFromRepo = _service.GetMarqueById(id);
            if (marqueFromRepo==null)
            {
                return NotFound();
            }
            _mapper.Map(marque, marqueFromRepo);
            _service.UpdateMarque(marqueFromRepo);
            return NoContent();
        }
        [HttpDelete("{id}")]
        public ActionResult DeleteMarque(int id)
        {
            Marque marqueModelFromRepo = _service.GetMarqueById(id);
            if (marqueModelFromRepo==null)
            {
                return NotFound();
            }
            _service.DeleteMarques(marqueModelFromRepo);
            return NoContent();
        }
    }
}
